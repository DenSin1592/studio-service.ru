<?php

namespace App\Services\FormProcessors;

use Illuminate\Database\Eloquent\Model;

interface CrudFormProcessorInterface
{
    /**
     * Create an element.
     */
    public function create(array $data = []): ?Model;

    /**
     * Update an element.
     */
    public function update(Model $model, array $data = []): bool;

    /**
     * Get errors.
     */
    public function errors(): array;
}
