<?php namespace App\Services\Breadcrumbs;

/**
 * Class Factory
 * @package App\Services\Breadcrumbs
 */
class Factory
{
    /**
     * Get breadcrumb container.
     *
     * @return Container
     */
    public function init(): Container
    {
        return new Container();
    }

    /**
     * Get breadcrumb container, but init it with collection and callback.
     * Each element of collection will be passed in callback.
     * Callback should return array: first return element - name, second - url.
     *
     * @param $collection
     * @param callable $urlGenerator
     * @return Container
     */
    public function initFromCollection($collection, callable $urlGenerator): Container
    {
        $container = $this->init();

        foreach ($collection as $index => $element) {
            $breadcrumb = $urlGenerator($element, $index);
            $container->add(
                \Arr::get($breadcrumb, 0),
                \Arr::get($breadcrumb, 1),
                \Arr::get($breadcrumb, 2, [])
            );
        }

        return $container;
    }
}
