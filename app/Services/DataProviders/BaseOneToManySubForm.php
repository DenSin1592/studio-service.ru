<?php


namespace App\Services\DataProviders;


use Illuminate\Database\Eloquent\Model;

abstract class BaseOneToManySubForm extends BaseSubForm
{
    public function provideData(Model $model, array $oldInput): array
    {
        $models = $this->repository->allForModel($model);
        return [static::SUB_FORM_NAME => $models];
    }
}
