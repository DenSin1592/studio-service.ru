<?php

namespace App\Services\FormProcessors;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface SubProcessor
 * Sub processor for form.
 *
 * @package App\Services\FormProcessors\AdminRole
 */
interface SubProcessorInterface
{
    /**
     * Prepare input data for sub processor.
     */
    public function prepareInputData(array $data): array;

    /**
     * Save data for form processor.
     */
    public function save(Model $model, array $data);
}
