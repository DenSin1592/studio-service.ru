<?php

namespace App\Models;

use App\Models\Features\AttachedToNode;

class ServicePage extends \Eloquent
{
    use AttachedToNode;

    protected $fillable = [
        'header',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];
}
