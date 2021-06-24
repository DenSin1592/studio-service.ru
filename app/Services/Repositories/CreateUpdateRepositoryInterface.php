<?php

namespace App\Services\Repositories;

/**
 * Interface CreateUpdateRepositoryInterface
 * @package App\Services\Repositories
 */
interface CreateUpdateRepositoryInterface
{

    /**
     * Create object with data.
     *
     * @param array $data
     * @return array
     */
    public function create(array $data);


    /**
     * Update object with data.
     *
     * @param \Eloquent $instance
     * @param array $data
     * @return array|null
     */
    public function update(\Eloquent $instance, array $data);
}
