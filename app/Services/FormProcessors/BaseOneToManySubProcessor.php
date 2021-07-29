<?php

namespace App\Services\FormProcessors;

use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

abstract class BaseOneToManySubProcessor extends BaseSubProcessor
{
    protected BaseOneToManyRepository $repository;

    abstract protected function setRepository(): void;

    abstract protected function SelectNotEmptyData(array &$imagesListData): void;

    public function __construct()
    {
        $this->setRepository();
    }

    public function save(Model $model, array $data)
    {
        $relation = static::SUB_FORM_NAME;

        $imagesListData = \Arr::get($data, $relation,  []);
        $this->SelectNotEmptyData($imagesListData);

        $currentIds = collect($model->$relation)
            ->pluck('id')
            ->all();

        $touchedIds = [];
        foreach ($imagesListData as $imageData) {
            $image = $this->repository->createOrUpdateRelationForModel($model, $imageData);
            $touchedIds[] = $image->id;
        }

        $idsToDelete = array_diff($currentIds, $touchedIds);
        foreach ($idsToDelete as $idToDelete) {
            $this->repository->deleteById($idToDelete);
        }
    }
}
