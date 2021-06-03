<?php

namespace App\Models\Features;

/**
 * Class PasswordSetter
 * @package App\Models\Features
 */
trait PasswordSetter
{
    /**
     * Hash the password on setting it.
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = \Hash::make($value);
    }
}
