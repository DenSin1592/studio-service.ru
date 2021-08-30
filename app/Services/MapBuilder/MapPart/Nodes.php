<?php

namespace App\Services\MapBuilder\MapPart;

use App\Models\Node;
use App\Services\MapBuilder\MapPart;
use App\Services\Repositories\Competencies\CompetenciesRepository;
use App\Services\Repositories\Node\NodeRepository;
use App\Services\Repositories\Services\ServicesRepository;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;

class Nodes implements MapPart
{
    public function __construct(
        private NodeRepository $repository
    ){}


    public function buildStructure(): array
    {
        $nodeList = $this->repository->getPublishedTree();
        $lvl = $this->buildLvl($nodeList);
        $types = $this->collectTypes($nodeList);
        $missingTypes = $this->getMissedUniqueTypes($types);
        foreach ($missingTypes as $type) {
            $lvl[] = [
                'name' => \TypeContainer::getTypeName($type),
                'url' => \TypeContainer::getClientUrl($this->repository->newInstance(['type' => $type])),
                'children' => [],
            ];
        }

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


    private function collectTypes($nodeList, array $types = []): array
    {
        /** @var Node $node */
        foreach ($nodeList as $node) {
            $types = $this->collectTypes($node->children, $types);
            if (!in_array($node->type, $types)) {
                $types[] = $node->type;
            }
        }

        return $types;
    }


    private function getMissedUniqueTypes(array $types): array
    {
        // Collect unique types
        $uniqueTypes = [];
        foreach (\TypeContainer::getTypeList() as $typeKey => $type) {
            if ($type->getUnique() && !in_array($typeKey, $types)) {
                $uniqueTypes[] = $typeKey;
            }
        }

        return $uniqueTypes;
    }
}
