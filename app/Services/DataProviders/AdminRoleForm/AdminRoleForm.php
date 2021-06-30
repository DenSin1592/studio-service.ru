<?php

namespace App\Services\DataProviders\AdminRoleForm;

use App\Models\AdminRole;

class AdminRoleForm
{
    private array $subFormList = [];

    public function provideDataFor(AdminRole $role, array $oldInput): array
    {
        $data = [
            'role' => $role,
        ];

        foreach ($this->subFormList as $subForm) {
            $subFormData = $subForm->provideDataFor($role, $oldInput);
            $data = array_replace($data, $subFormData);
        }

        return $data;
    }

    public function addSubForm(AdminRoleSubFormInterface $subForm): void
    {
        $this->subFormList[] = $subForm;
    }
}
