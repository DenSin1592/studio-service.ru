<?php namespace App\Services\DataProviders\AdminRoleForm;

use App\Models\AdminRole;

interface AdminRoleSubForm
{
    public function provideDataFor(AdminRole $adminRole, array $oldInput): array;
}
