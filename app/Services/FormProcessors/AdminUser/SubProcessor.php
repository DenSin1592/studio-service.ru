<?php namespace App\Services\FormProcessors\AdminUser;

use App\Models\AdminUser;

/**
 * Interface SubProcessor
 * Sub processor for form.
 *
 * @package App\Services\FormProcessors\AdminUser
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
     * @param AdminUser $adminUser
     * @param array $data
     */
    public function save(AdminUser $adminUser, array $data);
}
