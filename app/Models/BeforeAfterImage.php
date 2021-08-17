<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\Glue;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Illuminate\Database\Eloquent\Model;

class BeforeAfterImage extends Model
{
    use Glue;
    use AutoPublish;

    protected $fillable = [
        'name',
        'description',
        'publish',
        'on_home_page',
        'position',
        'image_before_file',
        'image_before_remove',
        'image_after_file',
        'image_after_remove',
    ];

    protected $casts = [
        'publish' => 'boolean',
        'on_home_page' => 'boolean',
    ];


    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('position');
    }


    protected static function boot(): void
    {
        parent::boot();

        self::mountUploader(
            'image_before',
            UploaderIntegrator::getUploader(
                'uploads/before_after_image/image_before', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(1145, 435, ['quality' => 100]),
            ], true
            )
        );

        self::mountUploader(
            'image_after',
            UploaderIntegrator::getUploader(
                'uploads/before_after_image/image_after', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(1145, 435, ['quality' => 100]),
            ], true
            )
        );

        static::deleting(function (self $model) {
            \DB::transaction(function () use ($model) {
                $model->services()->detach();
            });
        });
    }
}
