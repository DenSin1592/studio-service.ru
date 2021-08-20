<?php

namespace App\Services\Repositories\Offer\OfferContentBlock;

use App\Models\OfferContentBlock;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class OfferContentBlockRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new OfferContentBlock();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->offer();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->contentBlocks();
    }
}
