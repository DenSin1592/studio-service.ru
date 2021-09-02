<?php

namespace App\Services\Repositories\Offer\OfferTask;

use App\Models\OfferTask;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class OfferTaskRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new OfferTask();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->offer();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->tasks();
    }
}
