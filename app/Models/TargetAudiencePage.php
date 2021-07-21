<?php

namespace App\Models;

use App\Models\Features\AttachedToNode;
use App\Models\Helpers\AliasHelpers;

class TargetAudiencePage extends \Eloquent
{
    use AttachedToNode;

    protected $fillable = [
        'header',
        'meta_title',
        'meta_keywords',
        'meta_description',
    ];

    protected static function boot(): void
    {
        parent::boot();

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
