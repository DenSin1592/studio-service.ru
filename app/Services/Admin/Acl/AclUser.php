<?php

namespace App\Services\Admin\Acl;

interface AclUser
{
    /**
     *  Check that user is super.
     */
    public function isSuper(): bool;

    /**
     * Get all abilities for user.
     */
    public function getAbilities(): array;
}
