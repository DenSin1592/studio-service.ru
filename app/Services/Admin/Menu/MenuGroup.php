<?php

namespace App\Services\Admin\Menu;

/**
 * Class MenuGroup
 * Menu group container.
 * @package App\Services\Admin\Menu
 */
class MenuGroup
{
    public const SORT_ASC = 1;
    private array $menuElementList = [];


    public function __construct(
        private string $name,
        private string $icon,
        private ?int $sorting = null)
    {}

    /**
     * Add menu element to group.
     */
    public function addMenuElement(MenuElement $menuElement): void
    {
        $this->menuElementList[] = $menuElement;
    }

    /**
     * Get menu group name.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get menu group icon.
     */
    public function getIcon(): string
    {
        return $this->icon;
    }


    public function getMenuElementList(): array
    {
        $elementList = $this->menuElementList;
        if ($this->sorting == self::SORT_ASC) {
            usort(
                $elementList,
                function (MenuElement $_1, MenuElement $_2) {
                    if ($_1->getName() > $_2->getName()) {
                        return 1;
                    } elseif ($_1->getName() < $_2->getName()) {
                        return -1;
                    } else {
                        return 0;
                    }
                }
            );
        }

        return $elementList;
    }
}
