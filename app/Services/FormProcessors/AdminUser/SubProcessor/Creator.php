<?php

namespace App\Services\FormProcessors\AdminUser\SubProcessor;

use App\Services\FormProcessors\SubProcessor;
use Illuminate\Database\Eloquent\Model;


class Creator implements SubProcessor
{
    public function prepareInputData(array $data): array
    {
        return $data;
    }

    public function save(Model $user, array $data)
    {
        $creator = \Auth::user();
        if ($creator !== null && $user->parent === null && !$user->is($creator)) {
            $user->parent()->associate($creator);
            $user->save();
        }
    }
}
