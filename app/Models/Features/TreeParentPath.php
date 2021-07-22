<?php

namespace App\Models\Features;

use Illuminate\Database\Eloquent\Collection;

trait TreeParentPath
{
    /**
     * Cache of parent path.
     *
     * @var array|null
     */
    protected $parentPath;


    public function extractParentPath(): array
    {

        if (is_null($this->parentPath)) {
            $element = $this;
            $path = [];
            while (!is_null($element->parent_id)) {
                $path[] = $element->parent;
                $element = $element->parent;
            }
            $path = array_reverse($path);
            $this->parentPath = $path;
        }

        return $this->parentPath;
    }


    /**
     * Extract full path - parent path with itself
     *
     * @return array
     */
    public function extractPath(): array
    {
        $path = $this->extractParentPath();
        $path[] = $this;

        return $path;
    }


    /**
     * Set parents for elements in collection.
     */
    public static function setParents($elements): void
    {
        $elementsDict = [];
        foreach ($elements as $element) {
            $elementsDict[$element->id] = $element;
        }

        foreach ($elements as $element) {
            if (isset($elementsDict[$element->parent_id])) {
                $element->parent()->associate($elementsDict[$element->parent_id]);
            }
        }
    }


    /**
     * Make tree flat.
     */
    public static function flattenTree($tree): Collection
    {
        $elements = Collection::make([]);
        foreach ($tree as $element) {
            $elements[] = $element;
            foreach (self::flattenTree($element->children) as $child) {
                $elements[] = $child;
            }
        }

        return $elements;
    }
}
