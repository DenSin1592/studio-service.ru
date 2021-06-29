<?php

namespace App\Policies;

use App\Models\AdminRole;
use App\Models\AdminUser;
use App\Services\Repositories\AdminRole\AdminRoleRepository;

class AdminRolePolicy
{
    public function __construct(private AdminRoleRepository $adminRoleRepository)
    {}

    public function change(AdminUser $authUser, AdminRole $roleToCheck): bool
    {
        return $this->adminRoleRepository->allForUser($authUser)->contains($roleToCheck);
    }
}
