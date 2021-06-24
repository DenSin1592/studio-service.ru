<?php

namespace App\Services\StructureTypes;

class Type
{
    private $clientUrlCreator;

    public function __construct(
        private string $name,
        private bool $unique,
        private string $repoKey,
        callable $clientUrlCreator)
    {
        $this->clientUrlCreator = $clientUrlCreator;
    }


    public function getRepoKey(): string
    {
        return $this->repoKey;
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getUnique(): bool
    {
        return $this->unique;
    }


    public function getClientUrlCreator(): callable
    {
        return $this->clientUrlCreator;
    }
}
