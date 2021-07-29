<?php

namespace App\Services\FormProcessors\AdminRole\SubProcessor;

use App\Services\FormProcessors\BaseSubProcessor;
use Illuminate\Database\Eloquent\Model;

final class Creator extends BaseSubProcessor
{
    public function save(Model $role, array $data)
    {
        $creator = \Auth::user();
        if ($creator !== null && $role->parent === null) {
            $role->parent()->associate($creator);
            $role->save();
        }
    }
}
