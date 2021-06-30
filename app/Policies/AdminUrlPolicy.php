<?php

namespace App\Policies;

use App\Services\Admin\Acl\AclUserInterface;
use App\Services\Admin\Acl\Helpers\CheckHelper;

class AdminUrlPolicy
{
    public function __construct(private CheckHelper $checkHelper)
    {}

    public function before(AclUserInterface $user, $ability)
    {
        $this->checkHelper->setAbility($ability);
    }

    public function change(AclUserInterface $user, string $url = null, string $method = 'GET'): bool
    {
        return $this->checkHelper->checkAbility($user) && $this->checkHelper->checkUrl($url, $method);
    }
}
