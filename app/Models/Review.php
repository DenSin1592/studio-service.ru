<?php

namespace App\Models;

use App\Models\Features\AutoPublish;

use App\Models\Helpers\DeleteHelpers;
use Diol\Fileclip\Eloquent\Glue;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Diol\FileclipExif\FileclipExif;
use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    use AutoPublish;
    use Glue;
    use FileclipExif;

    protected $fillable = [
        'name',
        'publish',
        'on_home_page',
        'position',
        'preview_image_file',
        'preview_image_remove',
        'email',
        'ip',
        'text',
        'review_date',
        'youtube_link',
    ];

    protected $dates = ['review_date'];


    /*public function images()
    {
        return $this->hasMany(ReviewImage::class);
    }*/


    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('position');
    }


    public function getImgPath(string $field, ?string $version, string $noImageVersion)
    {
        if($this->getAttachment($field)?->exists($version))
            return asset($this->getAttachment($field)->getUrl($version));
        return asset('/images/common/no-image/' . $noImageVersion);
    }


    public function getReviewDateFormattedAttribute() : string
    {
        $str = strtotime($this->review_date);
        return date('d', $str)
            . ' '
            . trans('months.' . date('F', $str))
            . ' '
            . date('Y', $str);
    }


    protected static function boot()
    {
        parent::boot();

        self::mountUploader(
            'preview_image',
            UploaderIntegrator::getUploader(
                'uploads/reviews/preview_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(700, 500, ['quality' => 100]),
            ], true
            )
        );

        static::deleting(
            function (self $model) {
                \DB::transaction(function() use ($model){
                    //DeleteHelpers::deleteRelatedAll($model->images());
                    $model->services()->detach();
                });
            }
        );
    }
}
