<?php

namespace App\Services\RepositoryFeatures\Tree;

use App\Services\RepositoryFeatures\Order\OrderScopesInterface;
use Illuminate\Database\Eloquent\Model;

class TreeBuilder implements TreeBuilderInterface
{

    public function __construct(
        protected OrderScopesInterface $orderScopes
    ){}


    public function getTree(Model $modelTemplate, $parentId = null, ?callable $filterCallback = null)
    {
        if (is_null($filterCallback)) {
            $filterCallback = function ($query) {
                // nothing
            };
        }

        $with = [];
        $with['children'] = function ($query) use (&$with, $filterCallback) {
            $filterCallback($query);
            $this->orderScopes->scopeOrdered($query);
            $query->with($with);
        };

        $query = $modelTemplate->query();
        if (null === $parentId) {
            $this->scopeRooted($query);

        } else {
            $this->scopeChildOf($query, $parentId);
        }

        $this->orderScopes->scopeOrdered($query);
        $rootQuery = $query->with($with);
        $filterCallback($rootQuery);

        return $rootQuery->get();
    }


    public function getTreePath(Model $modelTemplate, $id)
    {
        $elementList = [];
        $elementParent = $modelTemplate->find($id);
        if (!is_null($elementParent)) {
            do {
                $elementList[] = $elementParent;
            } while (null !== $elementParent = $elementParent->parent()->first());
            $elementList = array_reverse($elementList);
        }

        return $elementList;
    }


    public function getCollapsedTree(Model $modelTemplate, $id = null)
    {
        $path = $this->getTreePath($modelTemplate, $id);
        $pathIdList = [];
        foreach ($path as $category) {
            $pathIdList[] = $category->id;
        }

        $query = $modelTemplate->query();
        $this->scopeRooted($query);

        return $this->getTreeLvl($modelTemplate, $query, $pathIdList);
    }


    private function getTreeLvl(Model $modelTemplate, $query, array $pathIdList)
    {
        $this->orderScopes->scopeOrdered($query);
        $result = $query->get();

        $lvl = [];
        foreach ($result as $category) {
            $lvlElement = ['element' => $category];

            $subQuery = $modelTemplate->query();
            $this->scopeChildOf($subQuery, $category->id);
            $children = $this->getTreeLvl($modelTemplate, $subQuery, $pathIdList);

            if (in_array($category->id, $pathIdList)) {
                $lvlElement['children'] = $children;
            } else {
                $lvlElement['children'] = [];
            }
            $lvlElement['hasChildren'] = count($children) > 0;
            $lvl[] = $lvlElement;
        }

        return $lvl;
    }


    public function getTreeVariants(
        Model $modelTemplate,
        ?int $currentId,
        ?string $root = null,
        ?int $parentId = null,
        ?callable $filterCallback = null,
        int $namePadding = 0,
        string $namePrefix = '',
        int $maxLvl = 999999
    ) {
        $tree = $this->getTree($modelTemplate, $parentId, $filterCallback);
        $lvlModelList = [];
        $flatten = function ($tree, $lvl = 0) use ($currentId, &$flatten, &$lvlModelList, $maxLvl) {
            foreach ($tree as $treeElement) {
                if ($currentId == $treeElement->id) {
                    continue;
                }
                $piece = new \stdClass();
                $piece->model = $treeElement;
                $piece->lvl = $lvl;
                $lvlModelList[] = $piece;

                if (isset($treeElement->children) && ($lvl < $maxLvl)) {
                    $flatten($treeElement->children, $lvl + 1);
                }
            }
        };
        $flatten($tree);

        $variantsArray = [];
        if (!is_null($root)) {
            $variantsArray[null] = $root;
            $startLvl = $namePadding + 1;
        } else {
            $startLvl = $namePadding;
        }

        foreach ($lvlModelList as $lvlModel) {
            $variantName = '';
            for ($i = 0; $i < $startLvl + $lvlModel->lvl; $i += 1) {
                $variantName .= '-';
            }
            if (!empty($variantName)) {
                $variantName .= ' ';
            }
            $variantName .= $namePrefix . $lvlModel->model->name;
            $variantsArray[$lvlModel->model->id] = $variantName;
        }

        return $variantsArray;
    }


    public function scopeRooted($query)
    {
        return $query->whereNull('parent_id');
    }


    public function scopeChildOf($query, int $id)
    {
        return $query->where('parent_id', $id);
    }


    public function getChildIds(Model $modelTemplate, ?int $rootId = null)
    {
        $idsList = [];

        $queue = [];
        $addToQueue = function ($list) use (&$queue) {
            foreach ($list as $c) {
                array_push($queue, $c);
            }
        };

        $query = $modelTemplate->query();
        if (is_null($rootId)) {
            $this->scopeRooted($query);
        } else {
            $query->where('id', $rootId);
        }

        $rooted = $query->get();
        $addToQueue($rooted);

        while (!is_null($c = array_pop($queue))) {
            $idsList[] = $c->id;

            $childrenQuery = $c->children();
            $addToQueue($childrenQuery->get());
        }

        return $idsList;
    }

    private function getParentAttributes(Model $modelTemplate, int $id, $attribute)
    {
        $attributes = [];

        /** @var mixed $modelInstance */
        $modelInstance = $modelTemplate->find($id);

        if (!is_null($modelInstance)) {
            $attributes = [];
            if ($p = $modelInstance->parent()->first()) {
                $attributes = $this->getParentAttributes($modelTemplate, $p->id, $attribute);
                $attributes[] = $p->{$attribute};
            }
        }

        return $attributes;
    }


    public function getParentIds(Model $modelTemplate, int $id)
    {
        return $this->getParentAttributes($modelTemplate, $id, 'id');
    }


    public function getRoot(Model $modelTemplate, int $id)
    {
        $ids = $this->getParentIds($modelTemplate, $id);
        $rootId = count($ids) > 0 ? $ids[0] : $id;

        return $modelTemplate->find($rootId);
    }
}
