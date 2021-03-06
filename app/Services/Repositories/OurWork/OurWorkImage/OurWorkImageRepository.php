<?php

namespace App\Services\Repositories\OurWork\OurWorkImage;

use App\Models\OurWorkImage;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class OurWorkImageRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new OurWorkImage();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->ourWork();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->images();
    }
}
