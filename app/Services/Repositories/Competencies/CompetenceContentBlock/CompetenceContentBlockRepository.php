<?php

namespace App\Services\Repositories\Competencies\CompetenceContentBlock;

use App\Models\CompetenceContentBlock;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class CompetenceContentBlockRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new CompetenceContentBlock();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->competence();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->contentBlocks();
    }
}
