<?php

namespace App\Services\Repositories\Pages\TextPage;

use App\Models\Node;
use App\Models\TextPage;
use App\Services\Repositories\BasePageRepository;

class TextPageRepository extends BasePageRepository
{
    protected function setModel(): void
    {
        $this->model = new TextPage();
    }

    protected function getRelationForNode(Node $node)
    {
        return $node->textPage();
    }
}
