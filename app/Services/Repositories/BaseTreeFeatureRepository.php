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
        return $this->treeBuilder->getTreeVariants(
            $this->getModel(),
            is_null($model) ? null : $model->id,
            $rootName,
            maxLvl: 0);
    }


    public function treePublishedWithAliases($aliases)
    {
        if (count($aliases) === 0)
            return Collection::make([]);

        return $this->getModel()->query()->where('publish', true)->whereIn('alias', $aliases)->get();
    }


    public function getPublishedTree()
    {
        return $this->treeBuilder->getTree($this->getModel(), null, static function ($query) {
            $query->where('publish', true);
        });
    }


    public function getModelsForSiteMap()
    {
        return $this->getModel()
            ->where('publish', true)
            ->whereNotNull('parent_id')
            ->orderBy('position')
            ->get();
    }
}
