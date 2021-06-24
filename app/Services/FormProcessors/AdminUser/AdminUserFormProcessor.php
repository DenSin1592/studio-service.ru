<?php

namespace App\Services\FormProcessors\AdminUser;

use App\Services\FormProcessors\CreateUpdateFormProcessor;
use App\Services\FormProcessors\SubProcessor;


class AdminUserFormProcessor extends CreateUpdateFormProcessor
{
    private array $subProcessorList = [];

    public function addSubProcessor(SubProcessor $subProcessor)
    {
        $this->subProcessorList[] = $subProcessor;
    }

    protected function prepareInputData(array $data): array
    {
        // password can be null
        if (!isset($data['password']) || $data['password'] === '') {
            unset($data['password']);
        }

        if (isset($data['allowed_ips'])) {
            $data['allowed_ips'] = array_filter(
                $data['allowed_ips'],
                function ($v) {
                    return trim($v) !== '';
                }
            );

        } else {
            $data['allowed_ips'] = [];
        }

        return $data;
    }

    public function update($user, array $data = []): bool
    {
        if (\Auth::user()->id === $user->id) {
            unset($data['active'], $data['admin_role_id']);
        }

        return parent::update($user, $data);
    }

    protected function afterSuccess($instance, array $data)
    {
        parent::afterSuccess($instance, $data);
        foreach ($this->subProcessorList as $subProcessor) {
            $subProcessor->save($instance, $data);
        }
    }
}
