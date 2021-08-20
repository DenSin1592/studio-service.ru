<?php

namespace App\Services\Repositories\Offer\OfferTab;

use App\Models\OfferTab;

use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class OfferTabRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new OfferTab();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->offer();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->tabs();
    }
}
