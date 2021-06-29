<?php

namespace App\Policies;

use App\Models\AdminUser;
use App\Services\Repositories\AdminUser\AdminUserRepository;

class AdminUserPolicy
{
    public function __construct(private AdminUserRepository $adminUserRepository)
    {}

    public function change(AdminUser $authUser, AdminUser $userToCheck): bool
    {
        return $this->adminUserRepository->allForUser($authUser)->contains($userToCheck);
    }
}
