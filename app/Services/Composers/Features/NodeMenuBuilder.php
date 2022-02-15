<?php

namespace App\Services\Composers\Features;

trait NodeMenuBuilder
{
    /**
     * Build menu from node list.
     *
     * @param $nodeList
     * @return array
     */
    protected function buildMenu($nodeList): array
    {
        $menu = [];
        foreach ($nodeList as $key => $node) {
            $nodeUrl = \TypeContainer::getClientUrl($node);
            $menu[] = [
                'name' => $node->name,
                'url' => $nodeUrl,
                'active' => \StringHelper::checkCurrentUrlIncludes($nodeUrl),
            ];
            $menu[$key]['children'] = [];

           foreach ($node->children as $childNode){
               $nodeChildUrl = \TypeContainer::getClientUrl($childNode);
               $menu[$key]['children'][] = [
                   'name' => $childNode->name,
                   'url' => $nodeChildUrl,
                   'active' => \StringHelper::checkCurrentUrlIncludes($nodeChildUrl),
               ];
           }
        }

        return $menu;
    }
}
