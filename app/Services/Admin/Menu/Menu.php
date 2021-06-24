<?php

namespace App\Services\Admin\Menu;

/**
 * Class Menu
 * Wrapper for menu items.
 * @package App\Services\Admin\Menu
 */
class Menu
{
    private array $menuItems = [];


    /**
     * Add menu element.
     */
    public function addMenuElement(MenuElement $menuElement): void
    {
        $this->menuItems[] = $menuElement;
    }

    /**
     * Add group of menu elements.
     */
    public function addMenuGroup(MenuGroup $menuGroup): void
    {
        $this->menuItems[] = $menuGroup;
    }

    /**
     * Get list of menu elements and groups of elements.
     */
    public function getMenuItems(): array
    {
        return $this->menuItems;
    }

    /**
     * Get flatten menu.
     */
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

    /**
     * Get first available menu element for current user.
     */
    public function getFirstAvailableAction(): ?string
    {
        return $this->getFlattenMenu()[0];
    }
}
