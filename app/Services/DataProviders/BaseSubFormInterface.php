<?php


namespace App\Services\DataProviders;

use Illuminate\Database\Eloquent\Model;

interface BaseSubFormInterface
{
    public function provideData(Model $model, array $oldInput): array;
}
