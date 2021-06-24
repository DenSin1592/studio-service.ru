<?php

namespace App\Services\FormProcessors\Features;

use App\Models\Helpers\AliasHelpers;

/**
 * Trait AutoAlias
 * @package App\Services\FormProcessors\Features
 */
trait AutoAlias
{
    /**
     * Set auto alias, based on name.
     */
    public function setAutoAlias(array $data, string $field = 'name'): array
    {
        $alias = !empty($data['alias']) ? $data['alias'] : \Arr::get($data, $field);
        $data['alias'] = AliasHelpers::generateAlias($alias);

        return $data;
    }
}
