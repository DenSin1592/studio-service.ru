<?php

namespace App\Services\FormProcessors;

/**
 * Interface SubProcessor
 * Sub processor for form.
 *
 * @package App\Services\FormProcessors\AdminRole
 */
interface SubProcessor
{
    /**
     * Prepare input data for sub processor.
     */
    public function prepareInputData(array $data): array;

    /**
     * Save data for form processor.
     */
    public function save(\Eloquent $adminUser, array $data);
}
