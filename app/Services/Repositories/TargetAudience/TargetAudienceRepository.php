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
            ->with(['children' => static function ($q) {
                $q->where('publish', true)
                    ->orderBy('position');
            }])
            ->get();
    }


    public function getModelforShowByAliasOrFail(string $alias)
    {
        return $this->getModel()
            ->with([
                'offers' => static function ($q) {
                    $q->whereHas('service', static function ($qu) {$qu->where('publish', true);})
                        ->with(['service' => static function ($qu) {
                            $qu->where('publish', true)
                                ->with(['tasks' => static function ($que) {
                                    $que->where('publish', true)
                                        ->orderBy('position');
                                }])->orderBy('position');
                        }])->where('publish', true)->orderBy('position');
                },
            ])
            ->where('alias', $alias)
            ->where('publish', true)
            ->firstOrFail();
    }


    public function getModelsForHomePage()
    {
        return $this->getModel()
            ->whereHas('parent', static function ($query) {
                $query->where('publish', true);
            })
            ->orWhere('parent_id', null)
            ->where('on_home_page', true)
            ->where('publish', true)
            ->orderBy('position')
            ->get();
    }

}

