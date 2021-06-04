<?php namespace App\Services\FormProcessors\Features;

use App\Models\Helpers\AliasHelpers;

/**
 * Class AutoAlias
 * @package App\Services\FormProcessors\Features
 */
trait AutoAlias
{
    /**
     * Set auto alias, based on name.
     *
     * @param array $data
     * @param string $field
     * @return array
     */
    public function setAutoAlias(array $data, string $field = 'name')
    {
        $alias = !empty($data['alias']) ? $data['alias'] : \Arr::get($data, $field);
        $data['alias'] = AliasHelpers::generateAlias($alias);

        return $data;
    }
}
