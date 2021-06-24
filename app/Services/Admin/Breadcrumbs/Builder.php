<?php

namespace App\Services\Admin\Breadcrumbs;

class Builder implements \IteratorAggregate
{
    /**
     * @var callable
     */
    private $pathBuilder;
    private array $options;
    private ?Path  $path;

    public function __construct(callable $pathBuilder)
    {
        $this->pathBuilder = $pathBuilder;
        $this->path = null;
    }

    public function setOptions($value): void
    {
        if (is_array($value)) {
            $options = $value;
        } else {
            $options = [$value];
        }
        $this->options = $options;
    }

    private function buildPath()
    {
        return call_user_func_array($this->pathBuilder, $this->options);
    }

    public function getIterator(): \ArrayIterator
    {
        if (null === $this->path) {
            $this->path = $this->buildPath();
        }

        return new \ArrayIterator($this->path->get());
    }
}
