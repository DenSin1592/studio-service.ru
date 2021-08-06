<?php

namespace App\Services\MapBuilder;

interface MapPart
{
    public function buildStructure(): array;
}
