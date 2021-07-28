<?php

namespace App\Services\DataProviders\AdminUserForm\AdminUserSubForm;

use App\Services\DataProviders\BaseSubForm;
use App\Services\Repositories\AdminRole\AdminRoleRepository;
use Illuminate\Database\Eloquent\Model;

class Roles extends BaseSubForm
{
    public function __construct(
        private AdminRoleRepository $adminRoleRepository
    ){}

    public function provideData(Model $model = null, array $oldInput = null): array
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
