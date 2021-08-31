<?php

namespace App\Services\MapBuilder\MapPart;

use App\Models\Node;
use App\Services\MapBuilder\MapPart;
use App\Services\Repositories\Node\NodeRepository;

class Nodes implements MapPart
{
    public function __construct(
        private NodeRepository $repository
    ){}


    public function buildStructure(): array
    {
        $nodeList = $this->repository->getPublishedTree();
        $lvl = $this->buildLvl($nodeList);

        return $lvl;
    }


    private function buildLvl($nodeList, ?Node $parent = null): array
    {
        $lvl = [];
        /** @var Node $node */
        foreach ($nodeList as $node) {
            if (!is_null($parent)) {
                $node->parent()->associate($parent);
            }
            $lvl[] = [
                'name' => $node->name,
                'url' => \TypeContainer::getClientUrl($node),
                'children' => $this->buildLvl($node->children, $node),
            ];

        }
        return $lvl;
    }
}
