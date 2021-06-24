<?php

namespace App\Models\Helpers;

class DeleteHelpers
{
    /**
     * Delete all related models for relation.
     */
    public static function deleteRelatedAll($associationQueryBuilder): void
    {
        foreach ($associationQueryBuilder->get() as $subModel) {
            $subModel->delete();
        }
    }

    /**
     * Delete first related model for relation.
     */
    public static function deleteRelatedFirst($associationQueryBuilder): void
    {
        $model = $associationQueryBuilder->first();
        if (!is_null($model)) {
            $model->delete();
        }
    }
}
