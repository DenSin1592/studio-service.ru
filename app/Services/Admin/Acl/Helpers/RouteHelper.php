<?php namespace App\Services\Admin\Acl\Helpers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Routing\Router;

class RouteHelper
{
    private Router $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function match(string $url, string $method): Route
    {
        return $this->router->getRoutes()->match(Request::create($url, $method));
    }
}
