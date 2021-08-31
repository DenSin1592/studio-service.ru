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
        $nodeList = $this->repository->getTree();
        $lvl = $this->buildLvl($nodeList);

        return $lvl;
    }


    private function buildLvl($nodeList, ?Node $parent = null): array
    {
        $lvl = [];

        foreach ($nodeList as $node) {
            if (!is_null($parent)) {
                $node->parent()->associate($parent);
            }
            $lvl[] = [
                'name' => $node->name,
                'url' => $node->publish ? \TypeContainer::getClientUrl($node) : null,
                'children' => array_merge(
                    $this->buildLvl($node->children, $node),
                    match ($node->type) {
                        Node::TYPE_TARGET_AUDIENCE_PAGE => $this->getCatalogElements(TargetAudienceRepository::class),
                        Node::TYPE_SERVICE_PAGE => $this->getCatalogElements(ServicesRepository::class),
                        Node::TYPE_COMPETENCE_PAGE => $this->getCatalogElements(CompetenciesRepository::class),
                        default => []
                    }),
            ];

        }
        return $lvl;
    }

    private function getCatalogElements(string $nameRepository): array
    {
        $modelList = resolve($nameRepository)->getModelsForSiteMap();
        $lvl = [];
        foreach ($modelList as $model) {
            $lvl[] = [
                'name' => $model->name,
                'url' => $model->url,
                'children' => []
            ];

        }
        return $lvl;
    }


}
