<?php namespace App\Services\Breadcrumbs;

/**
 * Class Container
 * Breadcrumbs container.
 *
 * @package App\Services\Breadcrumbs
 */
class Container
{
    /**
     * @var array
     */
    private $breadcrumbs = [];

    /**
     * Add breadcrumb.
     *
     * @param string $name
     * @param null|string $url
     * @param array $siblings
     */
    public function add($name, ?string $url = null, array $siblings = []): void
    {
        $this->breadcrumbs[] = ['name' => $name, 'url' => $url, 'siblings' => $siblings];
    }

    /**
     * Get breadcrumbs.
     *
     * @return array
     */
    public function getBreadcrumbs(): array
    {
        return $this->breadcrumbs;
    }

    /**
     * Get length.
     *
     * @return int
     */
    public function length(): int
    {
        return count($this->breadcrumbs);
    }
}
