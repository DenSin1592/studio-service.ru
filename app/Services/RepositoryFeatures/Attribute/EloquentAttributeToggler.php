<?php

namespace App\Services\RepositoryFeatures\Attribute;

use Illuminate\Database\Eloquent\Model;

/**
 * Helper to toggle eloquent model attributes.
 */
class EloquentAttributeToggler
{
    /**
     * Toggle attribute in model and save it.
     */
    public function toggleAttribute(Model $model, $attribute): ?Model
    {
        if (is_null($model))
            return null;

        $model->{$attribute} = !$model->{$attribute};
        $model->save();
        return $model;
    }
}
