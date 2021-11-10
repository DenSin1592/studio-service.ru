<?php

namespace App\Services\Copier\Core;

use App\Services\Repositories\CopierRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


abstract class Copier implements CopierInterface
{
    protected Model $source;
    protected Model $copy;
    protected CopierRepositoryInterface $repository;

    abstract protected function setRepository(): void;
    abstract protected function afterSave(): void;


    public function copy(Model $model): Model
    {
        $this->setDependencies($model);

        $this->beforeSave();

        DB::transaction(function (){
            $this->copy->save();
            $this->afterSave();
        });

        return $this->copy;
    }


    private function setDependencies(Model $model): void
    {
        $this->source = $model;
        $this->copy =$model->replicate();
        $this->setRepository();
    }


    private function beforeSave(): void
    {
        $this->setName();
        $this->copy->alias = '';
        $this->copy->publish = false;
        $this->copyAttachments($this->source, $this->copy);
    }


    protected function setName()
    {
        $sourceName = preg_replace('@\s*\(копия\s?\d*\)@u', '', $this->source->name);

        for ($i = 1; true; $i++){
            $this->copy->name = $sourceName . ' (копия ' . $i . ')';
            $count = $this->repository->getTheCountOfEntitysWithTheSameName($this->copy->name);

            if(!$count) break;
        }
    }


    protected function copyAttachments(Model $source, Model $copy): void
    {
        if(!method_exists($source, 'getAttachmentFields')){
            return;
        }

        $fields = $source::getAttachmentFields();

        foreach ($fields as $field) {
            $file = $source->getAttachment($field)->getUploader()->getAbsolutePath($source->$field);
            $copy->{"{$field}_file"} = $file;
        }
    }


    protected function copyManyToMany(string $relation): void
    {
        foreach ($this->source->$relation as $model) {
            $this->copy->$relation()->sync($model->id);
        }
    }


    protected function copyOneToMany(string $relation, string $subRelation = null): void
    {
        foreach ($this->source->$relation as $sourceSubModel) {

            $copySubModel = $sourceSubModel->replicate();
            $this->copyAttachments($sourceSubModel, $copySubModel);
            $this->copy->$relation()->save($copySubModel);

            if($subRelation){
                $this->subCopyOneToMany($sourceSubModel, $copySubModel,$subRelation);
            }
        }
    }


    protected function subCopyOneToMany(Model $model, Model $copyModel, string $relation): void
    {
        foreach ($model->$relation as $sourceSubModel) {

            $copySubModel = $sourceSubModel->replicate();
            $this->copyAttachments($sourceSubModel, $copySubModel);
            $copyModel->$relation()->save($copySubModel);
        }
    }
}
