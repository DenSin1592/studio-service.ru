<?php

namespace App\Models\Features;

/**
 * Trait which addes feature to get published models by default.
 */
trait AutoPublish
{
    public function getPublishAttribute()
    {
        return \Arr::get($this->attributes, 'publish', true);
    }
}
