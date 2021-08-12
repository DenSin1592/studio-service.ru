<?php

namespace App\Models;

use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\OutBoundVersion;
use Diol\FileclipExif\Glue;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OurWorkImage
 * @package App\Models
 */
class OurWorkImage extends Model
{
    use Glue;

    public const IMAGE_FILE = 'image_file';

    protected $fillable = [
       self::IMAGE_FILE,
        'image_remove',
        'position',
        'name',
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

        self::mountUploader('image', UploaderIntegrator::getUploader('uploads/our_works/images', [
            'thumb' => new OutBoundVersion(85, 85),
            'main'  => new OutBoundVersion(1500, 1000),
        ], false));
    }

}
