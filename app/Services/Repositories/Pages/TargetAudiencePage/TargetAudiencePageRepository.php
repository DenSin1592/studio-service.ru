<?php

namespace App\Services\Repositories\Pages\TargetAudiencePage;

use App\Models\TargetAudiencePage;
use App\Models\Node;
use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\Node\NodeContentRepositoryInterface;

class TargetAudiencePageRepository extends BaseRepository implements NodeContentRepositoryInterface
{
    public function findForNodeOrNew(Node $node) : TargetAudiencePage
    {
        $page = $node->targetAudiencePage()->first();
        if (is_null($page)) {
            $page = $this->getModel();
            $page->node()->associate($node);
        }

        return $page;
    }
}
