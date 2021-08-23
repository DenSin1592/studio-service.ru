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
        'section_tabs_name',
        'section_tabs_description' ,
        'section_tabs_publish',
        'section_requirements_name',
        'section_requirements_content',
        'section_requirements_publish',
        'section_faq_name',
        'section_faq_publish',
        'section_prices_name',
        'section_prices_content',
        'section_prices_publish',
        'section_advantages_content',
        'section_advantages_publish',
        'section_feedback_name',
        'section_feedback_publish',
        'section_competencies_name',
        'section_competencies_publish',
        'section_offers_name',
        'section_offers_publish',
        'section_reviews_publish'
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

    public function tabs()
    {
        return $this->hasMany(OfferTab::class);
    }

    public function faqQuestions()
    {
        return $this->hasMany(OfferFaqQuestion::class);
    }

    public function beforeAfterImages()
    {
        return $this->belongsToMany(BeforeAfterImage::class)->withPivot('position');
    }

    public function reviews()
    {
        return $this->belongsToMany(Review::class)->withPivot('position');
    }


    public function getUrlAttribute(): string
    {
        return route(\App\Http\Controllers\Client\EssenceControllers\OfferController::ROUTE_SHOW_ON_SITE, $this->alias);
    }


    public function otherOffers()
    {
        return $this->query()
            ->whereHas('service', static function ($q) { $q->where('publish', true); })
            ->whereHas('targetAudience', function ($q) { $q->where('publish', true); })
            ->whereNotIn('id', [$this->id])
            ->where('publish', true)
            ->with([
                'service.tasks' => static function ($q) {$q->orderBy('position')->where('publish', true);},
            ])
            ->orderBy('position')
            ->get();
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
                DeleteHelpers::deleteRelatedAll($model->tabs());
                DeleteHelpers::deleteRelatedAll($model->faqQuestions());
                $model->beforeAfterImages()->detach();
                $model->reviews()->detach();
            });
        });
    }
}
