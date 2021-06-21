<?php

namespace App\Services\Repositories\TargetAudiencePage;

use App\Models\TargetAudiencePage;
use App\Models\Node;
use App\Services\Repositories\Node\NodeContentRepositoryInterface;

class EloquentTargetAudiencePageRepository implements NodeContentRepositoryInterface
{
    public function findForNodeOrNew(Node $node) : TargetAudiencePage
    {
        $homePage = $node->targetAudiencePage()->first();
        if (is_null($homePage)) {
            $homePage = new TargetAudiencePage();
            $homePage->node()->associate($node);
        }

        return $homePage;
    }
}
