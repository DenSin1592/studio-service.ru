<?php

namespace App\Services\Repositories\Review\ReviewImage;

use App\Models\ReviewImage;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class ReviewImageRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new ReviewImage();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->review();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->images();
    }
}
