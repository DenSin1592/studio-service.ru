<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\OutBoundVersion;
use Diol\FileclipExif\Glue;

/**
 * Class ReviewImage
 * @package App\Models
 */
class ReviewImage extends \Eloquent
{
    use Glue;
    use AutoPublish;

    public const IMAGE_FILE = 'image_file';

    protected $fillable = [
        'image_file',
        'image_remove',
        'position',
        'publish',
        'review_id',
    ];

    public function review()
    {
        return $this->belongsTo(Review::class);
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
