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
        $currentUrl = \URL::current();
        foreach ($nodeList as $node) {
            $nodeUrl = \TypeContainer::getClientUrl($node);
            $menu[] = [
                'name' => $node->name,
                'url' => $nodeUrl,
                'active' => \StringHelper::checkUrlIncludes($currentUrl, $nodeUrl),
            ];
        }

        return $menu;
    }
}
