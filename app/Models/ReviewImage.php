<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\OutBoundVersion;
use Diol\FileclipExif\Glue;

class ReviewImage extends \Eloquent
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


    public function review()
    {
        return $this->belongsTo(Review::class);
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

        self::mountUploader('image', UploaderIntegrator::getUploader('uploads/reviews/images', [
            'thumb' => new OutBoundVersion(85, 85),
            'mini'  => new OutBoundVersion(300, 300),
        ], false));
    }

}
