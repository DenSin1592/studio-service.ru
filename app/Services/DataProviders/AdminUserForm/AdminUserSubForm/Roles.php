<?php

namespace App\Services\DataProviders\AdminUserForm\AdminUserSubForm;

use App\Services\DataProviders\BaseSubForm;
use App\Services\Repositories\AdminRole\AdminRoleRepository;

class Roles extends BaseSubForm
{
    public function __construct(
        private AdminRoleRepository $adminRoleRepository
    ){}

    public function provideData(\Eloquent $model = null, array $oldInput = null): array
    {
        $authUser = \Auth::user();

        $availableRoles = [];
        if ($authUser !== null) {
            $availableRoles = $this->adminRoleRepository->getVariantsForUser($authUser);
        }

        return [
            'available_roles' => $availableRoles,
        ];
    }
}
