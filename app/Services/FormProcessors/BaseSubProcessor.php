<?php


namespace App\Services\FormProcessors;


class BaseSubProcessor implements SubProcessor
{
    public function prepareInputData(array $data): array
    {
        return $data;
    }

    public function save(\Eloquent $model, array $data)
    {
        $relation = static::SUB_FORM_NAME;

        $dataModels = \Arr::get($data, static::SUB_FORM_NAME);
        if(is_null($dataModels))
            $dataModels = [];
        $position = 0;

        foreach ($dataModels as $id){
            $ids[$id['id']] = ['position' => $position++];
        }
        if(empty($ids))
            $ids = [];

        $model->$relation()->sync($ids);
    }
}
