<?php

namespace App\Services\MapBuilder\MapPart;

use App\Services\MapBuilder\MapPart;
use App\Services\Repositories\OurWork\OurWorkRepository;

class Projects implements MapPart
{
    public function __construct(
        private OurWorkRepository $repository
    ){}


    public function buildStructure(): array
    {
        $tree = $this->getCatalogElements();

        return [
            ['name' => 'Проекты', 'children' => $tree]
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
