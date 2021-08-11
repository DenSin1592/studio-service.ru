<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\OutBoundVersion;
use Diol\FileclipExif\Glue;
use Illuminate\Database\Eloquent\Model;

class ReviewImage extends Model
{
    use Glue;
    use AutoPublish;

    public const IMAGE_FILE = 'image_file';

    protected $fillable = [
        self::IMAGE_FILE,
        'image_remove',
        'position',
        'name',
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
            'preview'  => new OutBoundVersion(700, 500),
        ], false));
    }

}
