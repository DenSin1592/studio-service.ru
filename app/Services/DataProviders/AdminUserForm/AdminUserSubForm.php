<?php namespace App\Services\DataProviders\AdminUserForm;

use App\Models\AdminUser;

interface AdminUserSubForm
{
    public function provideDataFor(AdminUser $adminUser, array $oldInput): array;
}
