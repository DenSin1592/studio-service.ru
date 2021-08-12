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


    public function offers()
    {
        return $this->hasMany(Offer::class);
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
                'main' => new BoxVersion(400, 300, ['quality' => 100]),
            ], true
            )
        );

        static::deleting(function (self $model) {
            \DB::transaction(function() use ($model){
                $model->competencies()->detach();
                $model->reviews()->detach();
                $model->ourWorks()->detach();
                DeleteHelpers::deleteRelatedAll($model->tasks());
                DeleteHelpers::removeCommunicationAll($model->offers(), 'service_id');
            });
        });

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
