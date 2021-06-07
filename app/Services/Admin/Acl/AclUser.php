<?php namespace App\Services\Admin\Acl;

interface AclUser
{
    /**
     *  Check that user is super.
     *
     * @return bool
     */
    public function isSuper(): bool;

    /**
     * Get all abilities for user.
     *
     * @return array
     */
    public function getAbilities(): array;
}
