<?php

namespace App\Services\DataProviders\AdminUserForm;

use App\Models\AdminUser;

class AdminUserForm
{
    private array $subFormList = [];

    public function provideDataFor(AdminUser $user, array $oldInput): array
    {
        $data = [
            'user' => $user,
        ];

        foreach ($this->subFormList as $subForm) {
            $subFormData = $subForm->provideDataFor($user, $oldInput);
            $data = array_replace($data, $subFormData);
        }

        return $data;
    }

    public function addSubForm(AdminUserSubForm $subForm): void
    {
        $this->subFormList[] = $subForm;
    }
}
