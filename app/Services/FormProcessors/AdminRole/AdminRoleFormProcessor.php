<?php

namespace App\Services\FormProcessors\AdminRole;

use App\Services\FormProcessors\BaseFormProcessor;

final class AdminRoleFormProcessor extends BaseFormProcessor
{
    protected function prepareInputData(array $data): array
    {
        if (!array_key_exists('abilities', $data) || !is_array($data['abilities'])) {
            $data['abilities'] = [];
        }

        return $data;
    }
}
