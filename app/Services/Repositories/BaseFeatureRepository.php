<?php

namespace App\Services\Repositories;

use App\Services\Pagination\FlexPaginator;
use App\Services\RepositoryFeatures\Attribute\EloquentAttributeToggler;
use App\Services\RepositoryFeatures\Attribute\PositionUpdater;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class BaseFeatureRepository extends BaseRepository
{
    protected FlexPaginator $flexPaginator;
    protected EloquentAttributeToggler $attributeToggler;
    protected PositionUpdater $positionUpdater;


    public function __construct()
    {
        $this->positionUpdater = \App(PositionUpdater::class);
        $this->attributeToggler = \App(EloquentAttributeToggler::class);
        $this->flexPaginator = \App(FlexPaginator::class);
        parent::__construct();
    }


    public function getModelForShowByAlias(string $alias)
    {
        return $this->getModel()
            ->where('alias', $alias)
            ->where('publish', true)
            ->first() ?? $this->getModel();;
    }


    public function getModelsForHomePage()
    {
        return $this->getModel()
            ->where('on_home_page', true)
            ->where('publish', true)
            ->orderBy('position')
            ->get();
    }


    public function paginate(): LengthAwarePaginator
    {
        return $this->flexPaginator->make(
            fn ($page, $limit) => $this->allByPage($page, $limit),
            'reviews-pagination-page',
            'reviews-pagination-limit'
        );
    }


    public function allByIdsInSequence(array $ids): array
    {
        $models = [];
        $modelDict = $this->allByIds($ids)->getDictionary();
        foreach ($ids as $id) {
            if (isset($modelDict[$id])) {
                $models[] = $modelDict[$id];
            }
        }

        return $models;
    }


    public function updatePositions(array $positions): void
    {
        $this->positionUpdater->updatePositions($this->getModel(), $positions);
    }


    public function toggleAttribute($model, $attribute)
    {
        $this->attributeToggler->toggleAttribute($model, $attribute);

        return $model;
    }


    public function getEssencesBySearchString($searchString, $page = 1, $limit = 20): array
    {
        $query = $this->getModel()->query();

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


    public function getModelsForSiteMap()
    {
        return $this->getModel()
            ->where('publish', true)
            ->orderBy('position')
            ->get();
    }


    protected function allByPage($page, $limit): array
    {
        $query = $this->getModel()->query();

        $total = $query->count();
        $items = $query->skip($limit * ($page - 1))
            ->orderBy('position')
            ->take($limit)
            ->get();

        return [
            'page' => $page,
            'limit' => $limit,
            'items' => $items,
            'total' => $total,
        ];
    }


    private function allByIds(array $ids): Collection
    {
        if (count($ids) === 0)
            return Collection::make([]);

        return $this->getModel()
            ->query()
            ->whereIn('id', $ids)
            ->orderBy('position')
            ->get();
    }


    protected function selectProductCount($query)
    {
        return $query
            ->distinct()
            ->count();
    }
}
