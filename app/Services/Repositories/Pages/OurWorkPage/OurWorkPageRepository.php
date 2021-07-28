<?php

namespace App\Services\Repositories\Pages\OurWorkPage;

use App\Models\Node;
use App\Models\OurWorkPage;
use App\Services\Repositories\BasePageRepository;


class OurWorkPageRepository extends BasePageRepository
{
    protected function setModel(): void
    {
        $this->model = new OurWorkPage();
    }

    protected function getRelation(Node $node)
    {
        return $node->ourWorkPage();
    }

}
