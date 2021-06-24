<?php

namespace App\Services\FormProcessors\AdminRole\SubProcessor;

class Creator implements \App\Services\FormProcessors\SubProcessor
{
    public function prepareInputData(array $data): array
    {
        return $data;
    }

    public function save(\Eloquent $role, array $data)
    {
        $creator = \Auth::user();
        if ($creator !== null && $role->parent === null) {
            $role->parent()->associate($creator);
            $role->save();
        }
    }
}
