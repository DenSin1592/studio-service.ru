<?php

namespace App\Models\Features;

trait PasswordSetter
{
    /**
     * Hash the password on setting it.
     */
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = \Hash::make($value);
    }
}
