<?php

namespace App\Services\Admin\Menu;

use App\Services\Admin\Acl\Acl;

class Menu
{
    private array $menuItems = [];

    public function __construct(
        private Acl $acl,
    ){}


    public function addMenuElement(MenuElement $menuElement): void
    {
        $this->menuItems[] = $menuElement;
    }


    public function addMenuGroup(MenuGroup $menuGroup): void
    {
        $this->menuItems[] = $menuGroup;
    }


    public function getMenuItems(): array
    {
        return $this->menuItems;
    }


    public function getFlattenMenu(): array
    {
        $flattenMenu = [];
        foreach ($this->menuItems as $menuItem) {
            if ($menuItem instanceof MenuElement) {
                $flattenMenu[] = $menuItem;
            } elseif ($menuItem instanceof MenuGroup) {
                foreach ($menuItem->getMenuElementList() as $menuElement) {
                    $flattenMenu[] = $menuElement;
                }
            }
        }
        return $flattenMenu;
    }


    public function getFirstAvailableAction(): ?string
    {
        return $this->getFlattenMenu()[0];
    }



    public function getFirstAvailableUrl(): ?string
    {
        $redirectToUrl = null;
        foreach ($this->getFlattenMenu() as $menuElement) {
            $url = $menuElement->getUrl();
            if ($this->acl->checkRoute($url)) {
                $redirectToUrl = $url;
                break;
            }
        }

        return $redirectToUrl;
    }
}
