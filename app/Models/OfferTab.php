<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Helpers\DeleteHelpers;
use Illuminate\Database\Eloquent\Model;

class OfferTab extends Model
{
    use AutoPublish;

    protected $table = "offer_tabs_blocks";

    protected $fillable = [
        'tab_name',
        'publish',
        'position',
        'service_id',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    public function contentBlocks()
    {
        return $this->morphMany(TabsContentBlock::class, TabsContentBlock::RELATION);
    }

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(static function (self $model) {
            \DB::transaction(static function() use ($model){
                DeleteHelpers::deleteRelatedAll($model->contentBlocks());
            });
        });
    }
}
