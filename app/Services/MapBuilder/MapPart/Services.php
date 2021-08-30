<?php

namespace App\Services\MapBuilder\MapPart;

use App\Services\MapBuilder\MapPart;
use App\Services\Repositories\Services\ServicesRepository;

class Services implements MapPart
{
    public function __construct(
        private ServicesRepository $repository
    ){}


    public function buildStructure(): array
    {
        $tree = $this->getCatalogElements();

        return [
            ['name' => 'Услуги', 'children' => $tree]
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
