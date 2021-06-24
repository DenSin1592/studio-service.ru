<?php

namespace App\Services\Admin\Acl;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Collection;

class Acl
{
    private array $abilities = [];

    public function __construct(private GateContract $gate)
    {}

    public function define(string $ability, array $controllers, string $outName): void
    {
        $this->abilities[$ability] = new Ability($ability, $outName, $controllers);
    }


    public function abilities(): Collection
    {
        return collect($this->abilities);
    }

    public function checkRoute(string $url, string $method = 'GET'): bool
    {
        if (count($this->abilities) === 0)
            return false;

        foreach ($this->abilities()->keys() as $ability) {
            if ($this->gate->check($ability, [$url, $method]))
                return true;
        }

        return false;
    }

    public function checkSeo(): bool
    {
        $user = \Auth::user();
        return optional(optional($user)->role)->seo || optional($user)->super;
    }

    public function controllers(string $ability): array
    {
        return optional($this->abilities()->get($ability))->getControllers() ?? [];
    }
}
