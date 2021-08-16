<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\Glue;
use App\Models\Helpers\AliasHelpers;
use App\Models\Helpers\DeleteHelpers;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Glue;
    use AutoPublish;

    protected $fillable = [
        'name',
        'alias',
        'publish',
        'on_home_page',
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
    ];

    protected $casts = [
        'publish' => 'boolean',
    ];


    public function competencies()
    {
        return $this->belongsToMany(Competence::class)->withPivot('position');
    }


    public function reviews()
    {
        return $this->belongsToMany(Review::class)->withPivot('position');
    }


    public function ourWorks()
    {
        return $this->belongsToMany(OurWork::class)->withPivot('position');
    }


    public function tasks()
    {
        return $this->hasMany(ServiceTask::class);
    }


    public function contentBlocks()
    {
        return $this->hasMany(ServiceContentBlock::class);
    }

    public function tabs()
    {
        return $this->hasMany(ServiceTab::class);
    }


    public function offers()
    {
        return $this->hasMany(Offer::class);
    }

    public function faqQuestions()
    {
        return $this->hasMany(ServiceFaqQuestion::class);
    }

    public function getUrlAttribute(): string
    {
        return route(\App\Http\Controllers\Client\EssenceControllers\ServiceController::ROUTE_SHOW_ON_SITE, $this->alias);
    }


    protected static function boot(): void
    {
        parent::boot();

        self::mountUploader(
            'preview_image',
            UploaderIntegrator::getUploader(
                'uploads/services/preview_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(380, 293, ['quality' => 100]),
            ], true
            )
        );
        self::mountUploader(
            'header_block_background_image',
            UploaderIntegrator::getUploader(
                'uploads/services/header_block_background_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(1920, 900, ['quality' => 100]),
            ], true
            )
        );
        self::mountUploader(
            'image_right_from_header',
            UploaderIntegrator::getUploader(
                'uploads/services/image_right_from_header_file', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(664, 558, ['quality' => 100]),
            ], true
            )
        );
        self::mountUploader(
            'section_video_image',
            UploaderIntegrator::getUploader(
                'uploads/services/section_video_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(949, 394, ['quality' => 100]),
            ], true
            )
        );

        static::deleting(function (self $model) {
            \DB::transaction(function() use ($model){
                $model->competencies()->detach();
                $model->reviews()->detach();
                $model->ourWorks()->detach();
                DeleteHelpers::deleteRelatedAll($model->tasks());
                DeleteHelpers::deleteRelatedAll($model->contentBlocks());
                DeleteHelpers::deleteRelatedAll($model->tabs());
                DeleteHelpers::deleteRelatedAll($model->faqQuestions());
                DeleteHelpers::removeCommunicationAll($model->offers(), 'service_id');
            });
        });

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
