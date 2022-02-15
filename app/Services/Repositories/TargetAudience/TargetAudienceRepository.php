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


    public function getModelForShowByAlias(string $alias): TargetAudience
    {
        return $this->getModel()
            ->with([
                'offers' => static function ($q) {
                   $q->with(['tasks' => static function ($q) {
                       $q->where('publish', true)
                           ->orderBy('position');
                   }])->where('publish', true)->orderBy('position');
                },
            ])
            ->where('alias', $alias)
            ->where('publish', true)
            ->first() ?? $this->getModel();
    }


    public function getModelsForHomePage()
    {
        return $this->getModel()
            ->whereHas('parent', static function ($query) {
                $query->where('publish', true);
            })
            ->where('on_home_page', true)
            ->where('publish', true)
            ->orderBy('position')
            ->get();
    }


    public function getEssencesBySearchString($searchString, $page = 1, $limit = 20): array
    {
        $query = $this->getModel()->query()->whereNotNull('parent_id');

        $searchString = trim($searchString);
        if (!($searchString === '' || empty($searchString))){
            $query->where('name', 'like', "%{$searchString}%");
        }

        $totalCount = $this->selectProductCount($query);

        $products = $query
            ->skip($limit * ($page - 1))
            ->take($limit)
            ->get();

        return [
            'items' => $products,
            'total' => $totalCount,
            'page' => $page,
            'limit' => $limit,
        ];
    }

}

