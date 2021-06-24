<?php

namespace App\Services\Admin\Menu;

use App\Services\Admin\Menu\Exception\ActionNotFound;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

/**
 * Class MenuElement
 * Menu element container.
 * @package App\Services\Admin\Menu
 */
class MenuElement
{
    private string $name;
    private string $icon;
    private bool $openLinkInNewTab;

    /**
     * @var callable
     */
    private $url;

    /**
     * @var callable
     */
    private $activeResolver;


    /**
     * Create menu element.
     */
    public function __construct(
        string $name,
        string $icon,
        callable|string $url,
        callable|array|string $activeResolver,
        bool $targetBlank = false
    ) {
        $this->name = $name;
        $this->icon = $icon;
        $this->url = $url;
        $this->activeResolver = $activeResolver;
        $this->openLinkInNewTab = $targetBlank;
    }

    /**
     * Get menu element link.
     */
    public function getUrl(): callable|string
    {
        return $this->url;
    }

    /**
     * Get menu element icon.
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * Get menu element list.
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get active flag.
     *
     * @return callable
     */
    public function getActive()
    {
        $currentRoute = \Route::getCurrentRoute();
        $parameters = $currentRoute->parameters();

        $currentAction = $currentRoute->getAction();
        if (isset($currentAction['controller'])) {
            $controllerName = explode('@', $currentAction['controller'])[0];
        } else {
            $controllerName = null;
        }

        $activeResolver = $this->activeResolver;
        if (is_callable($activeResolver)) {
            $active = $activeResolver($controllerName, $parameters);

        } else {
            $active = in_array($controllerName, (array)$activeResolver);
        }

        return $active;
    }


    public function getOpenLinkInNewTab(): bool
    {
        return $this->openLinkInNewTab;
    }
}
