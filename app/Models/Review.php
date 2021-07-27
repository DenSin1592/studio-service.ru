<?php

namespace App\Models;

use App\Models\Features\AutoPublish;

use App\Models\Features\DeleteHelpers;
use App\Models\Helpers\AliasHelpers;
use Diol\Fileclip\Eloquent\Glue;
use Diol\FileclipExif\FileclipExif;


class Review extends \Eloquent
{
    use AutoPublish;
    use Glue;
    use FileclipExif;
    use DeleteHelpers;

    protected $fillable = [
        'name',
        'publish',
        'on_home_page',
        'position',
        'email',
        'ip',
        'text',
        'review_date',
    ];

    protected $dates = ['review_date'];


    public function images()
    {
        return $this->hasMany(ReviewImage::class);
    }


    public function services()
    {
        return $this->belongsToMany(Service::class)->withPivot('position');
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

        static::deleting(
            function (self $model) {
                self::deleteRelatedAll($model->images());
                $model->services()->detach();
            }
        );
    }
}
