<?php namespace App\Policies;

use App\Models\AdminUser;
use App\Services\Repositories\AdminUser\EloquentAdminUserRepository;

class AdminUserPolicy
{
    private EloquentAdminUserRepository $adminUserRepository;

    public function __construct(EloquentAdminUserRepository $adminUserRepository)
    {
        $this->adminUserRepository = $adminUserRepository;
    }

    public function change(AdminUser $authUser, AdminUser $userToCheck): bool
    {
        return $this->adminUserRepository->allForUser($authUser)->contains($userToCheck);
    }
}
