<?php

namespace App\Services\Repositories\Pages\ServicePage;

use App\Models\Node;
use App\Models\ServicePage;
use App\Services\Repositories\BasePageRepository;

class ServicePageRepository extends BasePageRepository
{
    protected function setModel(): void
    {
        $this->model = new ServicePage();
    }

    protected function getRelationForNode(Node $node)
    {
        return $node->servicePage();
    }
}
