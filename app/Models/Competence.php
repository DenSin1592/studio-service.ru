<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
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

    protected static function boot(): void
    {
        parent::boot();

        self::mountUploader(
            'preview_image',
            UploaderIntegrator::getUploader(
                'uploads/competencies/preview_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'small' => new BoxVersion(200, 350, ['quality' => 100]),
            ], true
            )
        );
    }
}