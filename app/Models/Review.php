<?php

namespace App\Models;

use App\Models\Features\AutoPublish;

use App\Models\Features\Glue;
use App\Models\Helpers\DeleteHelpers;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Illuminate\Database\Eloquent\Model;


class Review extends Model
{
    use AutoPublish;
    use Glue;

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

    public function offers()
    {
        return $this->belongsToMany(Offer::class)->withPivot('position');
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
                'main' => new BoxVersion(668, 451, ['quality' => 100]),
            ], true
            )
        );

        static::deleting(
            function (self $model) {
                \DB::transaction(function() use ($model){
                    //DeleteHelpers::deleteRelatedAll($model->images());
                    $model->services()->detach();
                    $model->offers()->detach();
                });
            }
        );
    }
}
