<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\Glue;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Illuminate\Database\Eloquent\Model;

class ServiceTask extends Model
{
    use Glue;
    use AutoPublish;

    protected $fillable = [
        'title',
        'publish',
        'text',
        'position',
        'icon_file',
        'icon_remove',
        'image_file',
        'image_remove',
        'service_id'
    ];

    protected $casts = [
        'publish' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }


    protected static function boot(): void
    {
        parent::boot();

        self::mountUploader(
            'icon',
            UploaderIntegrator::getUploader(
                'uploads/service_tasks/icons', [
                'main' => new BoxVersion(50, 50, ['quality' => 100]),
                'thumb' => new BoxVersion(85, 85, ['quality' => 100])
            ], true
            )
        );
        self::mountUploader(
            'image',
            UploaderIntegrator::getUploader(
                'uploads/service_tasks/image', [
                'main' => new BoxVersion(652, 430, ['quality' => 100]),
                'thumb' => new BoxVersion(85, 85, ['quality' => 100])
            ], true
            )
        );
    }

}
