<?php

namespace App\Services\Repositories\Node;

use App\Models\Node;
use App\Services\Repositories\BaseTreeFeatureRepository;
use App\Services\RepositoryFeatures\CreatorWithPosition;

class NodeRepository extends BaseTreeFeatureRepository
{
    use CreatorWithPosition;

    protected function setModel(): void
    {
        $this->model = new Node();
    }


    public function findByType($type, $published = false): ?Node
    {
        $query = $this->getModel()->where('type', $type);
        if ($published) {
            $query->where('publish', true);
        }

        return $query->first();
    }


    public function allByType($type)
    {
        return $this->getModel()->where('type', $type)->get();
    }


    public function treePublishedTopMenu()
    {
        return $this->getModel()
            ->where('menu_top', true)
            ->where('parent_id', null)
            ->with(['children' => function($q){
                $q->where('menu_top', true);
            }])
            ->orderBy('position')
            ->where('publish', true)
            ->get();
    }


    public function treePublishedBottomMenu()
    {
        return $this->getModel()
            ->where('menu_bottom', true)
            ->orderBy('position')
            ->where('publish', true)
            ->get();
    }
}
