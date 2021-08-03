<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Diol\FileclipExif\Glue;
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
    ];

    protected $casts = [
        'publish' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
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
                'main' => new BoxVersion(50, 50, ['quality' => 100]),
                'thumb' => new BoxVersion(85, 85, ['quality' => 100])
            ], true
            )
        );
    }

}
