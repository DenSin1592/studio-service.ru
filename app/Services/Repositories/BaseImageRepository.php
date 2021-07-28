<?php


namespace App\Services\Repositories;


abstract class BaseImageRepository extends BaseRepository
{
    abstract protected function getRelation(\Eloquent $model);


    public function allForModel(\Eloquent $model)
    {
        return $model->images()->get();
    }


    public function createOrUpdateImageForModel(\Eloquent $model, array $data = [])
    {
        $id = \Arr::get($data, 'id');
        $image = $model->images()->where('id', $id)->first();
        if (is_null($image)) {
            $image = $this->getModel();
            $this->getRelation($image)->associate($model);
        }

        if (\Arr::get($data, 'position') === null) {
            $maxPosition = $model->images()->max('position');
            if (is_null($maxPosition)) {
                $maxPosition = 0;
            }
            $data['position'] = $maxPosition + self::POSITION_STEP;
        }

        $image->fill($data);
        if ($image->isDirty()) {
            $model->touch();
        }
        $image->save();

        return $image;
    }


    public function deleteById($id): void
    {
        $image = $this->findById($id);
        if (!is_null($image)) {
            $this->getRelation($image)->first()->touch();
            $image->delete();
        }
    }
}
