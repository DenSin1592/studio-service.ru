<?php

namespace App\Services\Repositories;

use Illuminate\Database\Eloquent\Model;

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
     * @param Model $instance
     * @param array $data
     * @return array|null
     */
    public function update(Model $instance, array $data);
}
