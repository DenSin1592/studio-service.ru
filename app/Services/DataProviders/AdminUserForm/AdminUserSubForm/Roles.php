<?php

namespace App\Services\DataProviders\AdminUserForm\AdminUserSubForm;

use App\Models\AdminUser;
use App\Services\DataProviders\AdminUserForm\AdminUserSubForm;
use App\Services\Repositories\AdminRole\EloquentAdminRoleRepository;

class Roles implements AdminUserSubForm
{
    public function __construct(
        private EloquentAdminRoleRepository $adminRoleRepository
    ){}

    public function provideDataFor(AdminUser $adminUser, array $oldInput): array
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
