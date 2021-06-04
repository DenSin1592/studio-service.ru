<?php

namespace App\Models;

class Setting extends \Eloquent
{
    protected $casts = [
        'array_value' => 'array',
    ];

    protected $fillable = ['key', 'value', 'array_value',];
}
