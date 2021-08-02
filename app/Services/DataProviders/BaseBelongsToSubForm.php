<?php


namespace App\Services\DataProviders;


use Illuminate\Database\Eloquent\Model;

abstract class BaseBelongsToSubForm extends BaseSubForm
{
    public function provideData(Model $model, array $oldInput): array
    {
        $relation = static::SUB_FORM_NAME;
        return [static::SUB_FORM_NAME => $model->$relation];
    }
}
