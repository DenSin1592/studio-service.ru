<?php

namespace App\Models;

use App\Models\Features\AutoPublish;

use App\Models\Features\DeleteHelpers;
use Diol\Fileclip\Eloquent\Glue;
use Diol\FileclipExif\FileclipExif;
use Illuminate\Database\Eloquent\Model;


class Review extends Model
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
        'youtube_link',
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
                \DB::transaction(function() use ($model){
                    self::deleteRelatedAll($model->images());
                    $model->services()->detach();
                });
            }
        );
    }
}
