<?php

namespace App\Services\DataProviders\AdminRoleForm;

use App\Models\AdminRole;

interface AdminRoleSubFormInterface
{
    public function provideDataFor(AdminRole $adminRole, array $oldInput): array;
}
