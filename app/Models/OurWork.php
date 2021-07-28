<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\DeleteHelpers;
use App\Models\Helpers\AliasHelpers;
use Diol\Fileclip\Eloquent\Glue;
use Diol\FileclipExif\FileclipExif;
use Illuminate\Database\Eloquent\Model;

class OurWork extends Model
{
    use AutoPublish;
    use Glue;
    use FileclipExif;
    use DeleteHelpers;

    protected $fillable = [
        'name',
        'alias',
        'publish',
        'on_home_page',
        'position',
        'preview',
        'description',
    ];

    protected $casts = [
        'publish' => 'boolean',
        'position' => 'integer',
    ];


    public function images()
    {
        return $this->hasMany(OurWorkImage::class);
    }


    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('position');
    }


    public function getUrlAttribute(): string
    {
        return route(\App\Http\Controllers\Client\EssenceControllers\OurWorkController::ROUTE_SHOW_ON_SITE, $this->alias);
    }


    protected static function boot()
    {
        parent::boot();

        static::deleting(
            function (self $model) {
                self::deleteRelatedAll($model->images());
                $model->services()->detach();
            }
        );

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
