<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Helpers\AliasHelpers;
use Diol\FileclipExif\Glue;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use Glue;
    use AutoPublish;

    protected $fillable = [
        'title',
        'alias',
        'publish',
        'service_id',
        'target_audience_id',
        'position',
        'youtube_link',
        'block_advantages',
        'header',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'publish' => 'boolean',
    ];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function targetAudience()
    {
        return $this->belongsTo(TargetAudience::class);
    }

    /*public function getUrlAttribute(): string
    {
        return route(\App\Http\Controllers\Client\EssenceControllers\ServiceController::ROUTE_SHOW_ON_SITE, $this->alias);
    }*/





    protected static function boot(): void
    {
        parent::boot();

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model, 'title');
        });
    }
}
