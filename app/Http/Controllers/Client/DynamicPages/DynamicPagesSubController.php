<?php

namespace App\Http\Controllers\Client\DynamicPages;

use App\Models\Node;
use App\Services\Breadcrumbs\Container;
use App\Services\Breadcrumbs\Factory as Breadcrumbs;
use App\Services\Repositories\Node\NodeRepository;
use App\Services\Seo\MetaHelper;
use App\Services\StructureTypes\TypeContainer;

abstract class DynamicPagesSubController
{
    public function __construct(
        protected NodeRepository $nodeRepository,
        protected Breadcrumbs $breadcrumbs,
        protected TypeContainer $typeContainer,
        protected MetaHelper $metaHelper
    ) {}

    protected function getBreadcrumbs(Node $node): Container
    {
        $treePath = $node->extractPath();
        $breadcrumbs = $this->breadcrumbs->initFromCollection(
            $treePath,
            fn (Node $node) => [$node->name, $this->typeContainer->getClientUrl($node)]);

        return $breadcrumbs;
    }
}
