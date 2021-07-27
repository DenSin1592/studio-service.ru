<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Helpers\AliasHelpers;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Diol\FileclipExif\Glue;

class Competence extends \Eloquent
{
    use Glue;
    use AutoPublish;

    protected $table = 'competencies';

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



    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('position');
    }


    public function getUrlAttribute(): string
    {
        return route(\App\Http\Controllers\Client\EssenceControllers\CompetenceController::ROUTE_SHOW_ON_SITE, $this->alias);
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
                'uploads/competencies/preview_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'small' => new BoxVersion(350, 450, ['quality' => 100]),
            ], true
            )
        );

        static::deleting(function (self $model) {
            $model->services()->detach();
        });

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
