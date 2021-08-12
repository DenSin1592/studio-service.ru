<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\Glue;
use App\Models\Helpers\AliasHelpers;
use App\Models\Helpers\DeleteHelpers;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Illuminate\Database\Eloquent\Model;

class Competence extends Model
{
    use Glue;
    use AutoPublish;

    protected $table = 'competencies';

    protected $fillable = [
        'name',
        'alias',
        'publish',
        'description',
        'on_home_page',
        'black_header_preview',
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

    public function contentBlocks()
    {
        return $this->hasMany(CompetenceContentBlock::class);
    }


    public function getUrlAttribute(): string
    {
        return route(\App\Http\Controllers\Client\EssenceControllers\CompetenceController::ROUTE_SHOW_ON_SITE, $this->alias);
    }


    protected static function boot(): void
    {
        parent::boot();

        self::mountUploader(
            'preview_image',
            UploaderIntegrator::getUploader(
                'uploads/competencies/preview_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(350, 450, ['quality' => 100]),
            ], true
            )
        );

        static::deleting(function (self $model) {
            \DB::transaction(function () use ($model) {
                $model->services()->detach();
                DeleteHelpers::deleteRelatedAll($model->contentBlocks());
            });
        });

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
