<?php

namespace App\Services\DataProviders;

use Illuminate\Database\Eloquent\Model;

abstract class BaseParentVariantsSubForm extends BaseSubForm
{
    public function provideData(Model $model, array $oldInput): array
    {
        return [static::SUB_FORM_NAME => $this->repository->getParentVariants($model, '[Корень]')];
    }
}
