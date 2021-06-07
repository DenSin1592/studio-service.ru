<?php namespace App\Services\DataProviders\AdminRoleForm\AdminRoleSubForm;

use App\Models\AdminRole;
use App\Models\AdminUser;
use App\Services\Admin\Acl\Acl;
use App\Services\DataProviders\AdminRoleForm\AdminRoleSubForm;

class Abilities implements AdminRoleSubForm
{
    private Acl $acl;

    public function __construct(Acl $acl)
    {
        $this->acl = $acl;
    }

    public function provideDataFor(AdminRole $adminRole, array $oldInput): array
    {
        return ['abilities' => $this->getAbilitiesVariants()];
    }

    private function getAbilitiesVariants(): array
    {
        $abilitiesVariants = [];

        $abilities = $this->acl->abilities();
        if ($authUser = \Auth::user()) {
            if (!$authUser->super) {
                $abilities = $abilities->only($authUser->role->abilities);
            }
        }

        foreach ($abilities as $abilityIdentifier => $abilityObject) {
            $abilitiesVariants[$abilityIdentifier] = $abilityObject->getName();
        }

        return $abilitiesVariants;
    }
}
