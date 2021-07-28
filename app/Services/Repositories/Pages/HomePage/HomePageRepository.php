<?php

namespace App\Services\Repositories\Pages\HomePage;

use App\Models\HomePage;
use App\Models\Node;
use App\Services\Repositories\BasePageRepository;

class HomePageRepository extends BasePageRepository
{
    protected function setModel(): void
    {
        $this->model = new HomePage();
    }

    protected function getRelation(Node $node)
    {
        return $node->homePage();
    }
}
