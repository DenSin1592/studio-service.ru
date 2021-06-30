<?php

namespace App\Services\Admin\Acl\Helpers;

use App\Services\Admin\Acl\Acl;
use App\Services\Admin\Acl\AclUserInterface;
use Illuminate\Routing\UrlGenerator;
use Str;

class CheckHelper
{
    private Acl $acl;
    private RouteHelper $routeHelper;
    private UrlGenerator $urlGenerator;
    private string $ability;

    public function __construct(Acl $acl, RouteHelper $routeHelper, UrlGenerator $urlGenerator)
    {
        $this->acl = $acl;
        $this->routeHelper = $routeHelper;
        $this->urlGenerator = $urlGenerator;
    }

    public function setAbility(string $ability): void
    {
        $this->ability = $ability;
    }

    public function checkAbility(AclUserInterface $user): bool
    {
        return collect($user->getAbilities())->contains($this->ability);
    }

    public function checkUrl($url, $method): bool
    {
        if ($url === null) {
            $url = $this->urlGenerator->current();
        }

        $route = $this->routeHelper->match($url, $method);
        $expectedControllers = $this->acl->controllers($this->ability);

        [$actualController, $actualMethod] = Str::parseCallback($route->action['controller']);
        foreach ($expectedControllers as $expectedController) {
            [$expectedController, $expectedMethod] = Str::parseCallback($expectedController);

            if ($expectedController === $actualController) {
                if ($expectedMethod === null) {
                    return true;
                }

                if ($expectedMethod === $actualMethod) {
                    return true;
                }
            }
        }

        return false;
    }
}
