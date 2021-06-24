<?php

namespace App\Models\Features;

trait AttachedToNode
{
    public function node(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Node');
    }
}
