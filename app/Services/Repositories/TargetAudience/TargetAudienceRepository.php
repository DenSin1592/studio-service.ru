<?php

namespace App\Services\Repositories\TargetAudience;

use App\Models\TargetAudience;
use App\Services\Repositories\BaseTreeFeatureRepository;
use App\Services\RepositoryFeatures\CreatorWithPosition;

class TargetAudienceRepository extends BaseTreeFeatureRepository
{
    use CreatorWithPosition;

    protected function setModel(): void
    {
        $this->model = new TargetAudience();
    }

    public function getParentVariants(\Eloquent $model = null, $rootName = null)
    {
        return $this->treeBuilder->getTreeVariants(
            $this->getModel(),
            is_null($model) ? null : $model->id,
            $rootName,
            null,
            null, 0
            , ''
            , 0);
    }
}
