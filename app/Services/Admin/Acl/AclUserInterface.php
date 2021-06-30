<?php

namespace App\Services\Admin\Acl;

interface AclUserInterface
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
