<?php

namespace App\Services\DataProviders;

abstract class BaseSubForm
{
    abstract public function provideData(\Eloquent $model, array $oldInput): array;
}
