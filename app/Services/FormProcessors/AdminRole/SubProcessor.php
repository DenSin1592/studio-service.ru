<?php namespace App\Services\FormProcessors\AdminRole;

use App\Models\AdminRole;

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
     *
     * @param array $data
     * @return array
     */
    public function prepareInputData(array $data): array;

    /**
     * Save data for form processor.
     *
     * @param AdminRole $adminUser
     * @param array $data
     */
    public function save(AdminRole $adminUser, array $data);
}
