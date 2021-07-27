<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\OutBoundVersion;
use Diol\FileclipExif\Glue;

/**
 * Class OurWorkImage
 * @package App\Models
 */
class OurWorkImage extends \Eloquent
{
    use Glue;
    use AutoPublish;

    public const IMAGE_FILE = 'image_file';

    protected $fillable = [
       self::IMAGE_FILE,
        'image_remove',
        'position',
        'publish',
        'review_id',
    ];

    public function ourWork()
    {
        return $this->belongsTo(OurWork::class);
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

        self::mountUploader('image', UploaderIntegrator::getUploader('uploads/our-works/images', [
            'thumb' => new OutBoundVersion(85, 85),
            'mini'  => new OutBoundVersion(300, 300),
        ], false));
    }

}
