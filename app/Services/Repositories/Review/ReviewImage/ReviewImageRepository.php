<?php

namespace App\Services\Repositories\Review\ReviewImage;

use App\Models\ReviewImage;
use App\Services\Repositories\BaseImageRepository;

class ReviewImageRepository extends BaseImageRepository
{
    protected function setModel(): void
    {
        $this->model = new ReviewImage();
    }

    protected function getRelation(\Eloquent $model)
    {
        return $model->review();
    }
}
