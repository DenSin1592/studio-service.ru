<?php

namespace App\Services\Auth;

use App\Models\AdminUser;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;

/**
 * Class AdminUserProvider
 * Auth provider for admin user. It checks activity and ip.
 */
class AdminUserProvider extends EloquentUserProvider
{
    private array $ipDisableRestriction;

    public function __construct(HasherContract $hasher, $model, array $ipDisableRestriction = [])
    {
        parent::__construct($hasher, $model);
        $this->ipDisableRestriction = $ipDisableRestriction;
    }


    public function retrieveById($identifier)
    {
        return $this->filter(parent::retrieveById($identifier));
    }


    public function retrieveByToken($identifier, $token)
    {
        return $this->filter(parent::retrieveByToken($identifier, $token));
    }


    public function retrieveByCredentials(array $credentials)
    {
        return $this->filter(parent::retrieveByCredentials($credentials));
    }



    /**
     * Filter user with additional restrictions.
     */
    private function filter(?Authenticatable $adminUser) :?Authenticatable
    {
        if (!$adminUser instanceof AdminUser) {
            return null;
        }

        if (!$adminUser->active) {
            return null;
        }

        if (!$this->allowedForIp($adminUser)) {
            return null;
        }

        return $adminUser;
    }

    /**
     * Check if admin user is allowed for current user ip.
     */
    private function allowedForIp(AdminUser $adminUser) :bool
    {
        if (in_array(\App::environment(), $this->ipDisableRestriction)) {
            return true;
        }

        if (empty($adminUser->allowed_ips)) {
            return true;
        }

        return in_array(\Request::getClientIp(), $adminUser->allowed_ips);
    }
}
