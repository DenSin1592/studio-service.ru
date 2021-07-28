<?php

namespace App\Services\Repositories;

use App\Models\Node;
use App\Services\Repositories\Node\NodeContentRepositoryInterface;

abstract class BasePageRepository extends BaseRepository implements NodeContentRepositoryInterface
{
    public function findForNodeOrNew(Node $node)
    {
        $page = $this->getRelation($node)->first();
        if (is_null($page)) {
            $page = $this->getModel();
            $page->node()->associate($node);
        }

        return $page;
    }
}
