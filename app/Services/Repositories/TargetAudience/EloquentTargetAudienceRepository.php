<?php

namespace App\Services\Repositories\TargetAudience;

use App\Models\TargetAudience;
use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\CreateUpdateRepositoryInterface;
use App\Services\RepositoryFeatures\Attribute\EloquentAttributeToggler;
use App\Services\RepositoryFeatures\Attribute\PositionUpdater;
use App\Services\RepositoryFeatures\Order\OrderScopesInterface;
use App\Services\RepositoryFeatures\Tree\TreeBuilderInterface;
use Illuminate\Database\Eloquent\Collection;

class EloquentTargetAudienceRepository extends BaseRepository implements CreateUpdateRepositoryInterface
{
    const POSITION_STEP = 10;

    public function __construct(
        private OrderScopesInterface $orderScope,
        private TreeBuilderInterface $treeBuilder,
        private EloquentAttributeToggler $attributeToggler,
        private PositionUpdater $positionUpdater,
        protected $model
    )
    {parent::__construct($model);}


    public function getTree()
    {
        return $this->treeBuilder->getTree($this->getModel());
    }

    public function getParentVariants(TargetAudience $model = null, $rootName = null)
    {
        return $this->treeBuilder->getTreeVariants($this->getModel(), is_null($model) ? null : $model->id, $rootName, null, null, 0, '', 0);
    }

    public function create(array $data)
    {
        if (empty($data['position'])) {
            $maxPosition = $this->getModel()->where('parent_id', $data['parent_id'])->max('position');
            if (is_null($maxPosition)) {
                $maxPosition = 0;
            }
            $data['position'] = $maxPosition + self::POSITION_STEP;
        }

        return $this->getModel()->create($data);
    }


    public function getTreePath($model)
    {
        return $this->treeBuilder->getTreePath($this->getModel(), $model->id);
    }


    public function getPublishedTree()
    {
        return $this->treeBuilder->getTree($this->getModel(), null, function ($query) {
            $query->where('publish', true);
        });
    }


    public function getCollapsedTree($model = null)
    {
        return $this->treeBuilder->getCollapsedTree($this->getModel(), is_null($model) ? null : $model->id);
    }


    public function updatePositions(array $positions)
    {
        $this->positionUpdater->updatePositions($this->getModel(), $positions);
    }


    public function toggleAttribute($model, $attribute)
    {
        $this->attributeToggler->toggleAttribute($model, $attribute);

        return $model;
    }

    public function treePublishedWithAliases($aliases)
    {
        if (count($aliases) === 0)
            return Collection::make([]);

        return $this->getModel()->query()->where('publish', true)->whereIn('alias', $aliases)->get();
    }


    public function treePublishedChildrenFor($model)
    {
        if (!is_null($model)) {
            $query = $model->children();
        } else {
            $query = $this->getModel()->where('parent_id', null);
        }
        $query->where('publish', true);
        $this->orderScope->scopeOrdered($query);
        $children = $query->get();

        foreach ($children as $child) {
            $child->parent()->associate($model);
        }

        return $children;
    }
}
