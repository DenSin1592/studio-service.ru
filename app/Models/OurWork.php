<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\DeleteHelpers;
use App\Models\Helpers\AliasHelpers;
use Diol\Fileclip\Eloquent\Glue;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
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
        'preview_image_file',
        'preview_image_remove',
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

    public function getImgPath(string $field, ?string $version, string $noImageVersion)
    {
        if($this->getAttachment($field)?->exists($version))
            return asset($this->getAttachment($field)->getUrl($version));
        return asset('/images/common/no-image/' . $noImageVersion);
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

        static::deleting(
            function (self $model) {
                \DB::transaction(function() use ($model){
                    self::deleteRelatedAll($model->images());
                    $model->services()->detach();
                });
            }
        );

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
