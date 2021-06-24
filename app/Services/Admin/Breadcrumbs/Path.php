<?php

namespace App\Services\Admin\Breadcrumbs;

class Path implements \Countable
{
    private array $path = [];

    public function add($name, $url = null): void
    {
        $this->path[] = ['name' => $name, 'url' => $url];
    }

    public function merge(Path $other): Path
    {
        $this->path = array_merge($this->path, $other->path);
        return $this;
    }

    public function get(): array
    {
        return $this->path;
    }

    public function count(): int
    {
        return count($this->path);
    }
}
