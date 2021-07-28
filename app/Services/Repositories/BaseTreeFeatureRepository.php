<?php

namespace App\Services\Repositories;

use App\Services\RepositoryFeatures\Tree\TreeBuilderInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseTreeFeatureRepository extends BaseFeatureRepository
{
    protected TreeBuilderInterface $treeBuilder;


    public function __construct()
    {
        $this->treeBuilder = \App(TreeBuilderInterface::class);
        parent::__construct();
    }


    public function getTree()
    {
        return $this->treeBuilder->getTree($this->getModel());
    }


    public function getParentVariants(Model $model = null, $rootName = null)
    {
        return $this->treeBuilder->getTreeVariants($this->getModel(), is_null($model) ? null : $model->id, $rootName);
    }


    public function treePublishedWithAliases($aliases)
    {
        if (count($aliases) === 0)
            return Collection::make([]);

        return $this->getModel()->query()->where('publish', true)->whereIn('alias', $aliases)->get();
    }


    public function treePublishedChildrenFor(Model $model)
    {
        if (!is_null($model)) {
            $query = $model->children();
        } else {
            $query = $this->getModel()->where('parent_id', null);
        }
        $query->where('publish', true)
            ->orderBy('position');
        $children = $query->get();

        foreach ($children as $child) {
            $child->parent()->associate($model);
        }

        return $children;
    }
}
