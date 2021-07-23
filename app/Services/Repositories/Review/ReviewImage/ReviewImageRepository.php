<?php

namespace App\Services\Repositories\Review\ReviewImage;

use App\Models\Review;
use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\CreateUpdateRepositoryInterface;

class ReviewImageRepository extends BaseRepository implements CreateUpdateRepositoryInterface
{
    public function allForModel(Review $model)
    {
        return $model->images()->get();
    }

    private function getRelation(\Eloquent $model){
        return $model->review();
    }

    public function createOrUpdateForReview(\Eloquent $model, array $data = [])
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