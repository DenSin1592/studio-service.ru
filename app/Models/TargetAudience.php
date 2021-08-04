<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\TreeParentPath;
use App\Models\Helpers\AliasHelpers;
use App\Models\Helpers\DeleteHelpers;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Diol\FileclipExif\Glue;
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
        'header',
        'meta_title',
        'meta_description',
        'meta_keywords',
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
        return route(\App\Http\Controllers\Client\EssenceControllers\TargetAudienceController::ROUTE_SHOW_ON_SITE, $this->alias);
    }


    public function getImgPath(string $field, ?string $version, string $noImageVersion)
    {
        if($this->getAttachment($field)?->exists($version))
            return asset($this->getAttachment($field)->getUrl($version));
        return asset('/images/common/no-image/' . $noImageVersion);
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
                    'icon' => new BoxVersion(50, 50, ['quality' => 100]),
                    'thumb' => new BoxVersion(85, 85, ['quality' => 100])
                ], true
            )
        );

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
