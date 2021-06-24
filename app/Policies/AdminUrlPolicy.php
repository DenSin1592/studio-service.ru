<?php

namespace App\Policies;

use App\Services\Admin\Acl\AclUser;
use App\Services\Admin\Acl\Helpers\CheckHelper;

class AdminUrlPolicy
{
    public function __construct(private CheckHelper $checkHelper)
    {}

    public function before(AclUser $user, $ability)
    {
        $this->checkHelper->setAbility($ability);
    }

    public function change(AclUser $user, string $url = null, string $method = 'GET'): bool
    {
        return $this->checkHelper->checkAbility($user) && $this->checkHelper->checkUrl($url, $method);
    }
}
