<?php

namespace App\Services\MapBuilder;

use App\Services\MapBuilder\MapPart\Nodes;
use App\Services\MapBuilder\MapPart\Offers;
use App\Services\MapBuilder\MapPart\Projects;

class MapBuilder
{
    private array $mapPartList = [];

    public function __construct()
    {
        $this->addMapPartBuilder(\App(Nodes::class));
        $this->addMapPartBuilder(\App(Offers::class));
        $this->addMapPartBuilder(\App(Projects::class));
    }

    public function addMapPartBuilder(MapPart $mapPart): void
    {
        $this->mapPartList[] = $mapPart;
    }

    public function buildStructure(): array
    {
        $resultStructure = [];
        foreach ($this->mapPartList as $mapPart) {
            $resultStructure = array_merge($resultStructure, $mapPart->buildStructure());
        }

        return $resultStructure;
    }
}
