<?php

namespace App\Services\DataProviders;

use Illuminate\Database\Eloquent\Model;

abstract class BaseSubForm
{
    abstract public function provideData(Model $model, array $oldInput): array;
}
