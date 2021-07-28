<?php

namespace App\Services\DataProviders;

use Illuminate\Database\Eloquent\Model;

interface BaseDataProvaiderInterface
{
    public function provideData(Model $model, array $oldInput): array;
}
