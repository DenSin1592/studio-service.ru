<?php

namespace App\Services\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseOneToManyRepository extends BaseRepository
{
    abstract protected function getRelationForSubModel(Model $subModel);

    abstract protected function getRelationForModel(Model $model);


    public function allForModel(Model $model)
    {
        return $this->getRelationForModel($model)
            ->orderBy('position')
            ->get();
    }


    public function createOrUpdateRelationForModel(Model $model, array $data = [])
    {
        $id = \Arr::get($data, 'id');
        $subModel = $this->getRelationForModel($model)->where('id', $id)->first();
        if (is_null($subModel)) {
            $subModel = $this->getModel();
            $this->getRelationForSubModel($subModel)->associate($model);
        }

        if (\Arr::get($data, 'position') === null) {
            $maxPosition = $this->getRelationForModel($model)->max('position');
            if (is_null($maxPosition)) {
                $maxPosition = 0;
            }
            $data['position'] = $maxPosition + self::POSITION_STEP;
        }

        $subModel->fill($data);
        if ($subModel->isDirty()) {
            $model->touch();
        }
        $subModel->save();

        return $subModel;
    }


    public function deleteById($id): void
    {
        $subModel = $this->findById($id);
        if (!is_null($subModel)) {
            $this->getRelationForSubModel($subModel)->first()->touch();
            $subModel->delete();
        }
    }
}
