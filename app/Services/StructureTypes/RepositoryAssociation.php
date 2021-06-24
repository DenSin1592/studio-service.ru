<?php

namespace App\Services\StructureTypes;

use App\Services\Repositories\Node\NodeContentRepositoryInterface;

class RepositoryAssociation
{
    private $urlCreator;

    public function __construct(
        private NodeContentRepositoryInterface $nodeContentRepository,
        callable $urlCreator)
    {
        $this->urlCreator = $urlCreator;
    }


    public function getUrlCreator(): callable
    {
        return $this->urlCreator;
    }


    public function getNodeContentRepository(): NodeContentRepositoryInterface
    {
        return $this->nodeContentRepository;
    }
}
