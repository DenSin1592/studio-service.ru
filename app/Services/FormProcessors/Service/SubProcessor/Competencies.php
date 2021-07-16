<?php

namespace App\Services\FormProcessors\Service\SubProcessor;

use App\Services\FormProcessors\SubProcessor;
use Arr;

class Competencies implements SubProcessor
{

    public function prepareInputData(array $data): array
    {
        return $data;
    }

    public function save(\Eloquent $model, array $data)
    {
        $dataModels = Arr::get($data, 'competencies');
        if(is_null($dataModels))
            $dataModels = [];
        $position = 0;

        foreach ($dataModels as $id){
            $ids[$id['id']] = ['position' => $position++];
        }
        if(empty($ids))
            $ids = [];

        $model->competencies()->sync($ids);
    }
}
