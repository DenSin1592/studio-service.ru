<?php

namespace App\Services\Repositories\Review\ReviewImage;

use App\Models\Review;
use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\CreateUpdateRepositoryInterface;

class ReviewImageRepository extends BaseRepository implements CreateUpdateRepositoryInterface
{
    public function allForReview(Review $review)
    {
        return $review->images()->get();
    }

    public function createOrUpdateForReview(\Eloquent $review, array $data = [])
    {
        $id = \Arr::get($data, 'id');
        $image = $review->images()->where('id', $id)->first();
        if (is_null($image)) {
            $image = $this->getModel();
            $image->review()->associate($review);
        }

        if (\Arr::get($data, 'position') === null) {
            $maxPosition = $review->images()->max('position');
            if (is_null($maxPosition)) {
                $maxPosition = 0;
            }
            $data['position'] = $maxPosition + self::POSITION_STEP;
        }

        $image->fill($data);
        if ($image->isDirty()) {
            $review->touch();
        }
        $image->save();

        return $image;
    }

    public function deleteById($id): void
    {
        $image = $this->findById($id);
        if (!is_null($image)) {
            $image->review()->first()->touch();
            $image->delete();
        }
    }
}
