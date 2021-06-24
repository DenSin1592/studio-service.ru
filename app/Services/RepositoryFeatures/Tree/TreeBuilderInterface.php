<?php

namespace App\Services\RepositoryFeatures\Tree;

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
    public function getTree(\Eloquent $modelTemplate, int $parentId = null, ?callable $filterCallback = null);


    /**
     * Get path to tree - list of objects.
     *
     * @return mixed
     */
    public function getTreePath(\Eloquent $modelTemplate, int $id);


    /**
     * Get collapsed tree - useful for menu.
     *
     * @return mixed
     */
    public function getCollapsedTree(\Eloquent $modelTemplate, ?int $id = null);

    /**
     * Get hierarchical variants (for select, for example).
     *
     * @return mixed
     */
    public function getTreeVariants(
        \Eloquent $modelTemplate,
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
    public function getChildIds(\Eloquent $modelTemplate, ?int $rootId = null);

    /**
     * List of parent ids for this model.
     *
     * @return mixed
     */
    public function getParentIds(\Eloquent $modelTemplate, int $id);

    /**
     * Get root for model.
     *
     * @return \Eloquent
     */
    public function getRoot(\Eloquent $modelTemplate, int $id);
}
