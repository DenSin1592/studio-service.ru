<?php

namespace App\Services\DataProviders\AdminRoleForm\AdminRoleSubForm;

use App\Services\Admin\Acl\Acl;
use App\Services\DataProviders\BaseSubForm;
use Illuminate\Database\Eloquent\Model;

class Abilities extends BaseSubForm
{
    public function __construct(
        private Acl $acl
    ){}

    public function provideData(Model $model = null, array $oldInput = null): array
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
