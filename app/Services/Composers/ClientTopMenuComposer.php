<?php

namespace App\Services\Composers;

use App\Services\Composers\Features\NodeMenuBuilder;
use App\Services\Repositories\Node\NodeRepository;


class ClientTopMenuComposer
{
    use NodeMenuBuilder;

    private array $topMenu;


    public function __construct(
        private NodeRepository $repository
    ){}


    public function compose($view)
    {
        if(empty($this->topMenu)){
            $nodeList = $this->repository->treePublishedTopMenu();
            $this->topMenu = $this->buildMenu($nodeList);
        }

        $view->with('topMenu', $this->topMenu);
    }
}
