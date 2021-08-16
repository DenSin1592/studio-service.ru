<?php

namespace App\Services\Repositories\Services\ServiceTab;

use App\Models\ServiceContentBlock;
use App\Models\ServiceTab;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class ServiceTabRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new ServiceTab();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->service();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->tabs();
    }
}
