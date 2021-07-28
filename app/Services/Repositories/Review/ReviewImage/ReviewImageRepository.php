<?php

namespace App\Services\Repositories\Review\ReviewImage;

use App\Models\ReviewImage;
use App\Services\Repositories\BaseImageRepository;
use Illuminate\Database\Eloquent\Model;

class ReviewImageRepository extends BaseImageRepository
{
    protected function setModel(): void
    {
        $this->model = new ReviewImage();
    }

    protected function getRelation(Model $model)
    {
        return $model->review();
    }
}
