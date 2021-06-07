<?php

namespace App\Services\FormProcessors\AdminRole\SubProcessor;

use App\Models\AdminRole;
use App\Services\FormProcessors\AdminRole\SubProcessor;

class Creator implements SubProcessor
{
    public function prepareInputData(array $data): array
    {
        return $data;
    }

    public function save(AdminRole $role, array $data)
    {
        $creator = \Auth::user();
        if ($creator !== null && $role->parent === null) {
            $role->parent()->associate($creator);
            $role->save();
        }
    }
}
