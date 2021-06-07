<?php namespace App\Services\DataProviders\AdminUserForm\AdminUserSubForm;

use App\Models\AdminUser;
use App\Services\DataProviders\AdminUserForm\AdminUserSubForm;
use App\Services\Repositories\AdminRole\AdminRoleRepository;

class Roles implements AdminUserSubForm
{
    private AdminRoleRepository $adminRoleRepository;

    public function __construct(AdminRoleRepository $adminRoleRepository)
    {
        $this->adminRoleRepository = $adminRoleRepository;
    }

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
