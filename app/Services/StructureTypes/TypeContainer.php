<?php

namespace App\Services\StructureTypes;

use App\Models\Node;
use App\Services\Repositories\Node\NodeRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Container to manage types of App\Model\Node.
 */
class TypeContainer
{
    private NodeRepository $nodeRepository;
    private array $repositoryAssociations = [];
    private array $typeList = [];

    public function __construct(NodeRepository $nodeRepository)
    {
        $this->nodeRepository = $nodeRepository;
    }


    public function addRepositoryAssociation(string $repositoryKey, RepositoryAssociation $repositoryAssociation): void
    {
        $this->repositoryAssociations[$repositoryKey] = $repositoryAssociation;
    }


    public function addType(string $typeKey, Type $type): void
    {
        if (!isset($this->repositoryAssociations[$type->getRepoKey()]))
            throw new \InvalidArgumentException("Add repository with key {$type->getRepoKey()} first");

        $this->typeList[$typeKey] = $type;
    }


    public function getRepositoryAssociations(): array
    {
        return $this->repositoryAssociations;
    }


    public function getTypeList(): array
    {
        return $this->typeList;
    }


    public function getEnabledTypeList(int $nodeId = null): array
    {
        $result = [];
        foreach ($this->typeList as $typeKey => $type) {
            if ($type->getUnique()) {
                $nodes = $this->nodeRepository->allByType($typeKey);
                $count = 0;
                foreach ($nodes as $n) {
                    if (!is_null($nodeId) && $nodeId == $n->id) {
                        continue;
                    } else {
                        $count += 1;
                    }
                }

                if ($count > 0) {
                    continue;
                }
            }

            $result[$typeKey] = $type;
        }

        return $result;
    }


    public function getTypeName(string $typeKey): ?string
    {
        if (isset($this->typeList[$typeKey]))
            return $this->typeList[$typeKey]->getName();
        return null;
    }


    public function getContentModelFor(Node $node): ?Model
    {
        if (!isset($this->typeList[$node->type]))
            return null;

        $repoKey = $this->typeList[$node->type]->getRepoKey();
        $type = $this->repositoryAssociations[$repoKey];
        return $type->getNodeContentRepository()->findForNodeOrNew($node);
    }


    public function getContentUrl(Node $node): ?string
    {
        if (!isset($this->typeList[$node->type]))
            return null;

        $type = $this->typeList[$node->type];
        $repoAssociation = $this->repositoryAssociations[$type->getRepoKey()];
        $urlCreator = $repoAssociation->getUrlCreator();

        return $urlCreator($node);

    }

    public function getClientUrl(Node $node, bool $absolute = true): ?string
    {
        if (!isset($this->typeList[$node->type]))
            return null;

        $clientUrlCreator = $this->typeList[$node->type]->getClientUrlCreator();
        $clientUrl = $clientUrlCreator($node);

        if (!$absolute) {
            $clientUrl = '/' . ltrim(str_replace(\Request::getSchemeAndHttpHost(), '', $clientUrl), '/');
        }

        return $clientUrl;
    }
}
