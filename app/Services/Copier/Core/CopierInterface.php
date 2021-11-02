<?php

namespace App\Services\Copier\Core;

use Illuminate\Database\Eloquent\Model;

interface CopierInterface
{
    public function copy(Model $model): Model;
}
