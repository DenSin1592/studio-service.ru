<?php

namespace App\Services\Composers;

use App\Services\Composers\Features\NodeMenuBuilder;
use App\Services\Repositories\Node\NodeRepository;

class ClientTopMenuComposer
{
    use NodeMenuBuilder;

    public function __construct(
        private NodeRepository $repository
    ){}

    public function compose($view)
    {
        $nodeList = $this->repository->treePublishedTopMenu();
        $topMenu = $this->buildMenu($nodeList);
        $view->with('topMenu', $topMenu);
    }
}
