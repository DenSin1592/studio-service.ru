<?php

namespace App\Services\RepositoryFeatures\Attribute;

/**
 * Helper to toggle eloquent model attributes.
 */
class EloquentAttributeToggler
{
    /**
     * Toggle attribute in model and save it.
     */
    public function toggleAttribute(\Eloquent $model, $attribute): ?\Eloquent
    {
        if (is_null($model))
            return null;

        $model->{$attribute} = !$model->{$attribute};
        $model->save();
        return $model;
    }
}
