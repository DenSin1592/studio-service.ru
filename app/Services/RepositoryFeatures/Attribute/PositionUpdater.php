<?php

namespace App\Services\RepositoryFeatures\Attribute;

/**
 * Class PositionUpdater
 * @package App\Services\RepositoryFeatures\Attribute
 */
class PositionUpdater
{
    /**
     * Update positions according to array.
     */
    public function updatePositions(\Eloquent $modelTemplate, array $positionArray)
    {
        foreach ($positionArray as $id => $positionNumber) {
            $model = $modelTemplate->find($id);
            if (!is_null($model)) {
                $model->position = $positionNumber;
                $model->save();
            }
        }
    }
}
