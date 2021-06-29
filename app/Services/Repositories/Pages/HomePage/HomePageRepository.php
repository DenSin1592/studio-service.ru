<?php

namespace App\Services\Repositories\Pages\HomePage;

use App\Models\HomePage;
use App\Models\Node;
use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\Node\NodeContentRepositoryInterface;

class HomePageRepository extends BaseRepository implements NodeContentRepositoryInterface
{
    public function findForNodeOrNew(Node $node)
    {
        $page = $node->homePage()->first();
        if (is_null($page)) {
            $page = $this->getModel();
            $page->node()->associate($node);
        }

        return $page;
    }
}
