<?php

namespace App\Services\DataProviders\AdminUserForm;

use App\Models\AdminUser;

interface AdminUserSubFormInterface
{
    public function provideDataFor(AdminUser $adminUser, array $oldInput): array;
}
