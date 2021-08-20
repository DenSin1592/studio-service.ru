<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\Glue;
use App\Models\Helpers\AliasHelpers;
use App\Models\Helpers\DeleteHelpers;
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
        'section_tasks_name',
        'section_tasks_publish',
        'section_video_name',
        'section_video_link_youtube',
        'section_video_publish',
        'section_video_image_file',
        'section_video_image_remove',
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

    public function contentBlocks()
    {
        return $this->hasMany(OfferContentBlock::class);
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
        self::mountUploader(
            'section_video_image',
            UploaderIntegrator::getUploader(
                'uploads/offers/section_video_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(949, 394, ['quality' => 100]),
            ], true
            )
        );

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });

        static::deleting(function (self $model) {
            \DB::transaction(function() use ($model){
                DeleteHelpers::deleteRelatedAll($model->contentBlocks());
            });
        });
    }
}
