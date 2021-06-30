<?php

namespace App\Services\Composers;

use App\Services\Admin\Acl\Acl;
use App\Services\Admin\Menu\Menu;
use App\Services\Admin\Menu\MenuElement;
use App\Services\Admin\Menu\MenuGroup;

class AdminMainMenuComposer
{
    public function __construct(
        private Menu $mainMenu,
        private Acl $acl)
    {
    }

    public function compose($view)
    {
        $menuData = [];
        foreach ($this->mainMenu->getMenuItems() as $menuItem) {
            if ($menuItem instanceof MenuElement) {
                $menuDataElement = $this->getMenuElementData($menuItem);
                if (!is_null($menuDataElement)) {
                    $menuData[] = $menuDataElement;
                }
            } elseif ($menuItem instanceof MenuGroup) {
                $groupMenuElement = [
                    'name' => $menuItem->getName(),
                    'icon' => $menuItem->getIcon(),
                    'elements' => [],
                ];

                $groupMenuElementActive = false;
                foreach ($menuItem->getMenuElementList() as $menuElement) {
                    $menuDataElement = $this->getMenuElementData($menuElement);
                    if (!is_null($menuDataElement)) {
                        $groupMenuElement['elements'][] = $menuDataElement;
                        $groupMenuElementActive = $groupMenuElementActive || $menuDataElement['active'];
                    }
                }
                $groupMenuElement['active'] = $groupMenuElementActive;
                if (count($groupMenuElement['elements']) > 0) {
                    $menuData[] = $groupMenuElement;
                }
            }
        }

        $view->with('main_menu', $menuData);
    }


    private function getMenuElementData(MenuElement $menuElement): ?array
    {
        if (!$this->acl->checkRoute($menuElement->getUrl()))
            return null;

        return [
            'name' => $menuElement->getName(),
            'icon' => $menuElement->getIcon(),
            'link' => $menuElement->getUrl(),
            'active' => $menuElement->getActive(),
            'openLinkInNewTab' => $menuElement->getOpenLinkInNewTab(),
        ];
    }
}
