<?php

namespace App\Services\Repositories\Node;

use App\Models\Node;
use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\CreateUpdateRepositoryInterface;
use App\Services\RepositoryFeatures\Attribute\EloquentAttributeToggler;
use App\Services\RepositoryFeatures\Attribute\PositionUpdater;
use App\Services\RepositoryFeatures\Order\OrderScopesInterface;
use App\Services\RepositoryFeatures\Tree\TreeBuilderInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class NodeRepository
 * @package App\Services\Repositories\Node
 */
class NodeRepository extends BaseRepository implements CreateUpdateRepositoryInterface
{
    private const POSITION_STEP = 10;

    public function __construct(
        private OrderScopesInterface $orderScope,
        private TreeBuilderInterface $treeBuilder,
        private EloquentAttributeToggler $attributeToggler,
        private PositionUpdater $positionUpdater,
        protected $model
    ){
        parent::__construct($model);
    }


    public function findByType($type, $published = false): ?Node
    {
        $query = $this->getModel()->where('type', $type);
        if ($published) {
            $query->where('publish', true);
        }

        return $query->first();
    }


    public function allByType($type)
    {
        return $this->getModel()->where('type', $type)->get();
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


    public function getTreePath(Node $node)
    {
        return $this->treeBuilder->getTreePath($this->getModel(), $node->id);
    }


    public function getTree()
    {
        return $this->treeBuilder->getTree($this->getModel());
    }


    public function getPublishedTree()
    {
        return $this->treeBuilder->getTree($this->getModel(), null, function ($query) {
            $query->where('publish', true);
        });
    }


    public function getCollapsedTree(Node $node = null)
    {
        return $this->treeBuilder->getCollapsedTree($this->getModel(), is_null($node) ? null : $node->id);
    }


    public function getParentVariants(Node $node = null, $rootName = null)
    {
        return $this->treeBuilder->getTreeVariants($this->getModel(), is_null($node) ? null : $node->id, $rootName);
    }


    public function updatePositions(array $positions)
    {
        $this->positionUpdater->updatePositions($this->getModel(), $positions);
    }


    public function toggleAttribute(Node $node, $attribute)
    {
        $this->attributeToggler->toggleAttribute($node, $attribute);

        return $node;
    }


    public function treePublishedTopMenu()
    {
        $query = $this->getModel()->where('menu_top', true);
        $this->orderScope->scopeOrdered($query);
        $query->where('publish', true);

        return $query->get();
    }

    public function treePublishedWithAliases($aliases)
    {
        if (count($aliases) === 0)
            return Collection::make([]);

        return $this->getModel()->query()->where('publish', true)->whereIn('alias', $aliases)->get();
    }


    public function treePublishedChildrenFor(Node $node)
    {
        if (!is_null($node)) {
            $query = $node->children();
        } else {
            $query = $this->getModel()->where('parent_id', null);
        }
        $query->where('publish', true);
        $this->orderScope->scopeOrdered($query);
        $children = $query->get();

        foreach ($children as $child) {
            $child->parent()->associate($node);
        }

        return $children;
    }
}
