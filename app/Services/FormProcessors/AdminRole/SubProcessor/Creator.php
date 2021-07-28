<?php

namespace App\Services\FormProcessors\AdminRole\SubProcessor;

use App\Services\FormProcessors\SubProcessor;
use Illuminate\Database\Eloquent\Model;

class Creator implements SubProcessor
{
    public function prepareInputData(array $data): array
    {
        return $data;
    }

    public function save(Model $role, array $data)
    {
        $creator = \Auth::user();
        if ($creator !== null && $role->parent === null) {
            $role->parent()->associate($creator);
            $role->save();
        }
    }
}
