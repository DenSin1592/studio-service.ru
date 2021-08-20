<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\Glue;
use App\Models\Helpers\AliasHelpers;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use Glue;
    use AutoPublish;

    protected $fillable = [
        'name',
        'alias',
        'publish',
        'service_id',
        'target_audience_id',
        'position',
        //'youtube_link',
        //'block_advantages',
        'preview_image_file',
        'preview_image_remove',
        'header',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'header_block_background_image_file',
        'header_block_background_image_remove',
        'image_right_from_header_file',
        'image_right_from_header_remove',
        'achievements_block',
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


    public function getUrlAttribute(): string
    {
        return route(\App\Http\Controllers\Client\EssenceControllers\OfferController::ROUTE_SHOW_ON_SITE, $this->alias);
    }


    protected static function boot(): void
    {
        parent::boot();

        self::mountUploader(
            'preview_image',
            UploaderIntegrator::getUploader(
                'uploads/offers/preview_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(380, 293, ['quality' => 100]),
            ], true
            )
        );
        self::mountUploader(
            'header_block_background_image',
            UploaderIntegrator::getUploader(
                'uploads/offers/header_block_background_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(1920, 900, ['quality' => 100]),
            ], true
            )
        );
        self::mountUploader(
            'image_right_from_header',
            UploaderIntegrator::getUploader(
                'uploads/offers/image_right_from_header_file', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(664, 558, ['quality' => 100]),
            ], true
            )
        );

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
