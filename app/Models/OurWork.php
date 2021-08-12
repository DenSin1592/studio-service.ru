<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\Glue;
use App\Models\Helpers\AliasHelpers;
use App\Models\Helpers\DeleteHelpers;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Illuminate\Database\Eloquent\Model;

class OurWork extends Model
{
    use AutoPublish;
    use Glue;

    protected $fillable = [
        'name',
        'alias',
        'publish',
        'on_home_page',
        'position',
        'preview',
        'content_before_slider',
        'content_after_slider',
        'preview_image_file',
        'preview_image_remove',
        'header_block_background_image_file',
        'header_block_background_image_remove',
    ];

    protected $casts = [
        'publish' => 'boolean',
        'on_home_page' => 'boolean',
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

        self::mountUploader(
            'preview_image',
            UploaderIntegrator::getUploader(
                'uploads/our_works/preview_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(1000, 800, ['quality' => 100]),
            ], true
            )
        );

        self::mountUploader(
            'header_block_background_image',
            UploaderIntegrator::getUploader(
                'uploads/our_works/header_block_background_image', [
                'thumb' => new BoxVersion(200, 85, ['quality' => 100]),
                'main' => new BoxVersion(2000, 600, ['quality' => 100]),
            ], true
            )
        );

        static::deleting(
            function (self $model) {
                \DB::transaction(function() use ($model){
                    DeleteHelpers::deleteRelatedAll($model->images());
                    $model->services()->detach();
                });
            }
        );

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
