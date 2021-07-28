<?php

namespace App\Services\Repositories\Pages\CompetencePage;

use App\Models\CompetencePage;
use App\Models\Node;
use App\Services\Repositories\BasePageRepository;

class CompetencePageRepository extends BasePageRepository
{
    protected function setModel(): void
    {
        $this->model = new CompetencePage();
    }


    protected function getRelationForNode(Node $node)
    {
        return $node->competencePage();
    }
}
