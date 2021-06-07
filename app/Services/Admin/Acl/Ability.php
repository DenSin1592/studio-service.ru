<?php namespace App\Services\Admin\Acl;

class Ability
{
    private string $key;
    private string $name;
    private array $controllers;

    public function __construct(string $key, string $name, array $controllers)
    {
        $this->key = $key;
        $this->name = $name;
        $this->controllers = $controllers;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getControllers(): array
    {
        return $this->controllers;
    }
}
