<?php
namespace App\Services\FormProcessors\AdminUser\SubProcessor;

use App\Models\AdminUser;
use App\Services\FormProcessors\AdminUser\SubProcessor;

class Creator implements SubProcessor
{
    public function prepareInputData(array $data): array
    {
        return $data;
    }

    public function save(AdminUser $user, array $data)
    {
        $creator = \Auth::user();
        if ($creator !== null && $user->parent === null && !$user->is($creator)) {
            $user->parent()->associate($creator);
            $user->save();
        }
    }
}
