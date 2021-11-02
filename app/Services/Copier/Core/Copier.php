<?php

namespace App\Services\Copier\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class Copier implements CopierInterface
{
    protected Model $source;
    protected Model $copy;
    protected array $fieldsForCopy;

    abstract protected function afterSave(): void;
    abstract protected function setFieldsForCopy(): void;


    public function copy(Model $model): Model
    {
        $this->setDependies($model);
        $this->setFieldsForCopyEntity();

        $this->beforeSave();

        DB::transaction(function (){
            $this->copy->save();
            $this->afterSave();
        });

        return $this->copy;
    }


    private function setDependies(Model $model): void
    {
        $this->source = $model;
        $this->copy = \App::make($model::class);
        $this->setFieldsForCopy();
    }


    private function setFieldsForCopyEntity(): void
    {
        foreach ($this->fieldsForCopy as $field) {
            $this->copy->$field = $this->source->$field;
        }
    }


    private function beforeSave(): void
    {
        $this->setName();
        $this->copyAttachments($this->source, $this->copy);
    }


    protected function setName()
    {
        $sourceName = preg_replace('@\s*\(копия\)@u', '', $this->source->name);
        //$modelsCount = Offer::where('name', 'like', "{$sourceName}%")->count();
        //$this->copy->name = $sourceName . ' (копия' . ($modelsCount ? ' ' . ($modelsCount) : '') . ')';
        $this->copy->name = $sourceName . ' (копия)';

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


    protected function copyOneToMany(string $relation, array $fieldsForCopy): void
    {
        foreach ($this->source->$relation as $sourceSubModel) {

            $copySubModel = \App::make($sourceSubModel::class);

            foreach($fieldsForCopy as $field){
                $copySubModel->$field = $sourceSubModel->$field;
            }

            $this->copyAttachments($sourceSubModel, $copySubModel);
            $this->copy->$relation()->save($copySubModel);
        }
    }


}
