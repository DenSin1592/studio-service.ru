<?php

namespace App\Services\Repositories\Pages\OurWorkPage;

use App\Models\Node;
use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\Node\NodeContentRepositoryInterface;

class OurWorkPageRepository extends BaseRepository implements NodeContentRepositoryInterface
{
    public function findForNodeOrNew(Node $node)
    {
        $page = $node->ourWorkPage()->first();
        if (is_null($page)) {
            $page = $this->getModel();
            $page->node()->associate($node);
        }

        return $page;
    }
}
