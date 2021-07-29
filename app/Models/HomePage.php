<?php

namespace App\Models;

use App\Models\Features\AttachedToNode;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use AttachedToNode;

    protected $fillable = [
        'header',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'block_advantages'
    ];
}
