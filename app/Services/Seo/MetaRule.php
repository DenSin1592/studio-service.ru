<?php

namespace App\Services\Seo;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MetaRule
 * Rule to build meta-data for page.
 * @package App\Services\Seo
 */
class MetaRule
{
    /**
     * @var callable
     */
    private $rule;


    public function __construct(callable $rule)
    {
        $this->rule = $rule;
    }


    /**
     * Get data for object.
     */
    public function metaForObject(Model $object, string $name = null, array $additionalData = []): array
    {
        if (!empty($object->header)) {
            $h1 = $object->header;
        } elseif (!empty($object->name)) {
            $h1 = $object->name;
        } elseif (!is_null($name)) {
            $h1 = $name;
        } else {
            $h1 = '';
        }

        $metaTitle = !empty($object->meta_title) ? $object->meta_title : '';
        $metaKeywords = !empty($object->meta_keywords) ? $object->meta_keywords : '';
        $metaDescription = !empty($object->meta_description) ? $object->meta_description : '';

        $metaData = [
            'h1' => $h1,
            'meta_title' => $metaTitle,
            'meta_description' => $metaDescription,
            'meta_keywords' => $metaKeywords,
        ];

        $rule = \Closure::bind($this->rule, $this, get_called_class());
        $metaData = $rule($metaData, [
            'object' => $object,
            'name' => $name,
            'additionalData' => $additionalData,
        ]);

        return $metaData;
    }


    /**
     * Get meta data for name.
     */
    public function metaForName(string $name, array $additionalData = []): array
    {
        $metaData = [
            'h1' => $name,
            'meta_title' => '',
            'meta_description' => '',
            'meta_keywords' => '',
        ];

        $rule = \Closure::bind($this->rule, $this, get_called_class());
        $metaData = $rule($metaData, [
            'name' => $name,
            'additionalData' => $additionalData,
        ]);

        return $metaData;
    }
}
