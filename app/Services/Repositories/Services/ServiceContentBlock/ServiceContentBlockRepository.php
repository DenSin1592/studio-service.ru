<?php

namespace App\Services\Repositories\Services\ServiceContentBlock;

use App\Models\ServiceContentBlock;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class ServiceContentBlockRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new ServiceContentBlock();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->service();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->contentBlocks();
    }
}
