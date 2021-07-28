<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $casts = [
        'array_value' => 'array',
    ];

    protected $fillable = ['key', 'value', 'array_value',];
}
