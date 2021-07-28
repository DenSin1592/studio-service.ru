<?php

namespace App\Services\Repositories\Pages\TargetAudiencePage;

use App\Models\TargetAudiencePage;
use App\Models\Node;
use App\Services\Repositories\BasePageRepository;

class TargetAudiencePageRepository extends BasePageRepository
{
    protected function setModel(): void
    {
        $this->model = new TargetAudiencePage();
    }

    protected function getRelationForNode(Node $node)
    {
        return $node->targetAudiencePage();
    }

}
