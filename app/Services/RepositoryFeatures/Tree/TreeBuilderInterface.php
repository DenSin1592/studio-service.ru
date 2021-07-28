<?php

namespace App\Services\RepositoryFeatures\Tree;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface TreeBuilderInterface
 * Interface for tree builder.
 *
 * @package App\Services\RepositoryFeatures\Tree
 */
interface TreeBuilderInterface
{

    /**
     * Get tree.
     *
     * @return mixed
     */
    public function getTree(Model $modelTemplate, int $parentId = null, ?callable $filterCallback = null);


    /**
     * Get path to tree - list of objects.
     *
     * @return mixed
     */
    public function getTreePath(Model $modelTemplate, int $id);


    /**
     * Get collapsed tree - useful for menu.
     *
     * @return mixed
     */
    public function getCollapsedTree(Model $modelTemplate, ?int $id = null);

    /**
     * Get hierarchical variants (for select, for example).
     *
     * @return mixed
     */
    public function getTreeVariants(
        Model $modelTemplate,
        int $currentId,
        ?string $root = null,
        ?int $parentId = null,
        ?callable $filterCallback = null,
        int $namePadding = 0,
        string $namePrefix = '',
        int $maxLvl = 999999
    );


    /**
     * Change query to select rooted element.
     *
     * @return mixed
     */
    public function scopeRooted($query);


    /**
     * Change query to select elements inside of some element.
     *
     * @return mixed
     */
    public function scopeChildOf($query, int $id);


    /**
     * List of ids inside of this model.
     *
     * @return array
     */
    public function getChildIds(Model $modelTemplate, ?int $rootId = null);

    /**
     * List of parent ids for this model.
     *
     * @return mixed
     */
    public function getParentIds(Model $modelTemplate, int $id);

    /**
     * Get root for model.
     *
     * @return Model
     */
    public function getRoot(Model $modelTemplate, int $id);
}
