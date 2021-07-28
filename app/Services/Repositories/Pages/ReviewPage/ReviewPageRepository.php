<?php

namespace App\Services\Repositories\Pages\ReviewPage;

use App\Models\Node;
use App\Models\ReviewPage;
use App\Services\Repositories\BasePageRepository;

class ReviewPageRepository extends BasePageRepository
{
    protected function setModel(): void
    {
        $this->model = new ReviewPage();
    }

    protected function getRelation(Node $node)
    {
        return $node->reviewPage();
    }
}
