<?php

namespace App\Services\Repositories\Services\ServiceTask;

use App\Models\ServiceTask;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class ServiceTaskRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new ServiceTask();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->service();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->tasks();
    }
}
