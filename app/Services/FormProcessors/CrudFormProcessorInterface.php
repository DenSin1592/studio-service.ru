<?php

namespace App\Services\FormProcessors;

interface CrudFormProcessorInterface
{
    /**
     * Create an element.
     */
    public function create(array $data = []): ?\Eloquent;

    /**
     * Update an element.
     */
    public function update(\Eloquent $model, array $data = []): bool;

    /**
     * Get errors.
     */
    public function errors(): array;
}
