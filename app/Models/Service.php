<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Helpers\AliasHelpers;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Diol\FileclipExif\Glue;

class Service extends \Eloquent
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


    public function getUrlAttribute(): string
    {
        return route(\App\Http\Controllers\Client\EssenceControllers\ServiceController::ROUTE_SHOW_ON_SITE, $this->alias);
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

        self::mountUploader(
            'preview_image',
            UploaderIntegrator::getUploader(
                'uploads/services/preview_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'small' => new BoxVersion(400, 300, ['quality' => 100]),
            ], true
            )
        );

        static::deleting(function (self $model) {
            $model->competencies()->detach();
            $model->reviews()->detach();
            $model->ourWorks()->detach();
        });

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
