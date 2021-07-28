<?php

namespace App\Services\DataProviders\AdminUserForm\AdminUserSubForm;

use App\Services\DataProviders\BaseSubForm;
use App\Services\Repositories\AdminRole\AdminRoleRepository;
use Illuminate\Database\Eloquent\Model;

final class Roles extends BaseSubForm
{
    protected function setRepository()
    {
        $this->repository = \App(AdminRoleRepository::class);
    }

    public function provideData(Model $model = null, array $oldInput = null): array
    {
        $authUser = \Auth::user();

        $availableRoles = [];
        if ($authUser !== null) {
            $availableRoles = $this->repository->getVariantsForUser($authUser);
        }

        return [
            'available_roles' => $availableRoles,
        ];
    }


}
