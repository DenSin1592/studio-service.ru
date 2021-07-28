<?php

namespace App\Models\Features;

trait AttachedToNode
{
    public function node()
    {
        return $this->belongsTo('App\Models\Node');
    }
}
