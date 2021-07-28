<?php

namespace App\Services\RepositoryFeatures\Tree;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface PublishedTreeBuilderInterface
 * Tree builder interface for published tree.
 *
 * @package App\Services\RepositoryFeatures\Tree
 */
interface PublishedTreeBuilderInterface extends TreeBuilderInterface
{
    /**
     * List of published ids.
     *
     * @param Model $modelTemplate
     * @param null $rootId
     * @return array
     */
    public function getPublishedIds(Model $modelTemplate, $rootId = null): array;

    /**
     * Modify query to select published elements in lvl.
     *
     * @param $query
     * @return mixed
     */
    public function scopePublishedInLvl($query);

    /**
     * Modify query to select published elements according to tree.
     *
     * @param Model $modelTemplate
     * @param $query
     * @return mixed
     */
    public function scopePublishedInTree(Model $modelTemplate, $query);

    /**
     * Get published children for current element.
     *
     * @param Model $modelTemplate
     * @param $id
     * @return mixed
     */
    public function getPublishedChildren(Model $modelTemplate, $id);
}
