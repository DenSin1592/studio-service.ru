<?php

namespace App\Services\FormProcessors\AdminUser\SubProcessor;

use App\Services\FormProcessors\BaseSubProcessor;
use Illuminate\Database\Eloquent\Model;

final class Creator extends BaseSubProcessor
{

    public function save(Model $user, array $data)
    {
        $creator = \Auth::user();
        if ($creator !== null && $user->parent === null && !$user->is($creator)) {
            $user->parent()->associate($creator);
            $user->save();
        }
    }
}
