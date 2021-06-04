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
    public function create(array $data) :array;


    /**
     * Update object with data.
     *
     * @param mixed $instance
     * @param array $data
     * @return array|null
     */
    public function update(mixed $instance, array $data) :?array;
}
