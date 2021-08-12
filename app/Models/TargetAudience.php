<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\Glue;
use App\Models\Features\TreeParentPath;
use App\Models\Helpers\AliasHelpers;
use App\Models\Helpers\DeleteHelpers;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Illuminate\Database\Eloquent\Model;

class TargetAudience extends Model
{
    use Glue;
    use AutoPublish;
    use TreeParentPath;

    protected $fillable = [
        'parent_id',
        'alias',
        'name',
        'publish',
        'on_home_page',
        'position',
        'icon_file',
        'icon_remove',
        'background_image_file',
        'background_image_remove',
        'header',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'content_top',
    ];

    protected $casts = [
        'publish' => 'boolean',
    ];


    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }


    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }


    public function offers()
    {
        return $this->hasMany(Offer::class);
    }


    public function getUrlAttribute(): string
    {
        return !empty($this->parent_id)
            ? route(\App\Http\Controllers\Client\EssenceControllers\TargetAudienceController::ROUTE_SHOW_ON_SITE, $this->alias)
            : 'javascript:void(0);';

    }


    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function (self $model) {
            \DB::transaction(function() use ($model){
                DeleteHelpers::deleteRelatedAll($model->children());
                DeleteHelpers::removeCommunicationAll($model->offers(), 'target_audience_id');
            });
        });

        self::mountUploader(
            'icon',
            UploaderIntegrator::getUploader(
                'uploads/target_audience/icons', [
                    'main' => new BoxVersion(50, 50, ['quality' => 100]),
                    'thumb' => new BoxVersion(85, 85, ['quality' => 100])
                ], true
            )
        );

        self::mountUploader(
            'background_image',
            UploaderIntegrator::getUploader(
                'uploads/target_audience/background_images', [
                    'main' => new BoxVersion(660, 1400, ['quality' => 100]),
                    'thumb' => new BoxVersion(85, 85, ['quality' => 100])
                ], true
            )
        );

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
