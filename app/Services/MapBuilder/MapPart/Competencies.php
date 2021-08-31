<?php

namespace App\Services\MapBuilder\MapPart;

use App\Services\MapBuilder\MapPart;
use App\Services\Repositories\Competencies\CompetenciesRepository;

class Competencies implements MapPart
{
    public function __construct(
        private CompetenciesRepository $repository
    ){}


    public function buildStructure(): array
    {
        $tree = $this->getCatalogElements();

        return [
            ['name' => 'Компетенции', 'children' => $tree]
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
