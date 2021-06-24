<?php

namespace App\Services\FormProcessors\AdminRole;

use App\Services\FormProcessors\CreateUpdateFormProcessor;
use App\Services\FormProcessors\SubProcessor;

class AdminRoleFormProcessor extends CreateUpdateFormProcessor
{
    private array $subProcessorList = [];

    public function addSubProcessor(SubProcessor $subProcessor)
    {
        $this->subProcessorList[] = $subProcessor;
    }


    protected function prepareInputData(array $data): array
    {
        if (!array_key_exists('abilities', $data) || !is_array($data['abilities'])) {
            $data['abilities'] = [];
        }

        return $data;
    }


    protected function afterSuccess($instance, array $data)
    {
        parent::afterSuccess($instance, $data);
        foreach ($this->subProcessorList as $subProcessor) {
            $subProcessor->save($instance, $data);
        }
    }
}
