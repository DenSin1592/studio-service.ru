<?php

namespace App\Services\Admin\Acl;

class Ability
{
    public function __construct(
        private string $key,
        private string $name,
        private array $controllers
    ){}

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
