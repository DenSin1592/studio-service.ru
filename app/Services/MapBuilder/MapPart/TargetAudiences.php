<?php

namespace App\Services\MapBuilder\MapPart;

use App\Services\MapBuilder\MapPart;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;

class TargetAudiences implements MapPart
{
    public function __construct(
        private TargetAudienceRepository $repository
    ){}


    public function buildStructure(): array
    {
        $tree = $this->getCatalogElements();

        return [
            ['name' => 'Целевые аудитории', 'children' => $tree]
        ];
    }


    private function getCatalogElements(): array
    {
        $modelList = $this->repository->getModelsForSiteMap();
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
