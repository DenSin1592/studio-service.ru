<?php

namespace App\Services\Repositories\TargetAudience;

use App\Models\TargetAudience;
use App\Services\Repositories\BaseTreeFeatureRepository;
use App\Services\RepositoryFeatures\CreatorWithPosition;
use Illuminate\Database\Eloquent\Model;

class TargetAudienceRepository extends BaseTreeFeatureRepository
{
    use CreatorWithPosition;

    protected function setModel(): void
    {
        $this->model = new TargetAudience();
    }

    public function getParentVariants(Model $model = null, $rootName = null)
    {
        return $this->treeBuilder->getTreeVariants(
            $this->getModel(),
            is_null($model) ? null : $model->id,
            $rootName,
            null,
            null,
            0,
            '',
            0);
    }


   public function getModelsForTargetAudiencePage()
   {
      return $this->getModel()
          ->where('publish', true)
          ->where('parent_id', null)
          ->orderBy('position')
          ->with(['children' => static function($q){
              $q->where('publish', true)
                  ->orderBy('position');
          }])
          ->get();
   }
}

