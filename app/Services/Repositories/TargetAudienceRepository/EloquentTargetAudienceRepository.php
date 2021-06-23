<?php

namespace App\Services\Repositories\TargetAudienceRepository;

use App\Models\TargetAudience;
use App\Services\Repositories\CreateUpdateRepositoryInterface;
use App\Services\RepositoryFeatures\Attribute\EloquentAttributeToggler;
use App\Services\RepositoryFeatures\Attribute\PositionUpdater;
use App\Services\RepositoryFeatures\Order\OrderScopesInterface;
use App\Services\RepositoryFeatures\Tree\TreeBuilderInterface;

class EloquentTargetAudienceRepository implements CreateUpdateRepositoryInterface
{
    const POSITION_STEP = 10;

    private EloquentAttributeToggler $attributeToggler;
    private OrderScopesInterface $orderScope;
    private TreeBuilderInterface $treeBuilder;
    private PositionUpdater $positionUpdater;

    public function __construct(
        OrderScopesInterface $orderScope,
        TreeBuilderInterface $treeBuilder,
        EloquentAttributeToggler $attributeToggler,
        PositionUpdater $positionUpdater
    ) {
        $this->orderScope = $orderScope;
        $this->treeBuilder = $treeBuilder;
        $this->attributeToggler = $attributeToggler;
        $this->positionUpdater = $positionUpdater;
    }


    public function newInstance(): TargetAudience
    {
        return new TargetAudience();
    }

    public function getTree()
    {
        return $this->treeBuilder->getTree(new TargetAudience());
    }

    public function getParentVariants(TargetAudience $model = null, $rootName = null)
    {
        return $this->treeBuilder->getTreeVariants(new TargetAudience(), is_null($model) ? null : $model->id, $rootName, null, null, 0, '', 0);
    }

    public function create(array $data)
    {
        if (empty($data['position'])) {
            $maxPosition = TargetAudience::where('parent_id', $data['parent_id'])->max('position');
            if (is_null($maxPosition)) {
                $maxPosition = 0;
            }
            $data['position'] = $maxPosition + self::POSITION_STEP;
        }

        return TargetAudience::create($data);
    }


    public function update(\Eloquent $instance, array $data)
    {
        return $instance->update($data);
    }
}
