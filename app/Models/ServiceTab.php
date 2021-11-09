<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Helpers\DeleteHelpers;
use Illuminate\Database\Eloquent\Model;

class ServiceTab extends Model
{
    use AutoPublish;

    protected $table = "service_tabs_block_tabs";

    protected $fillable = [
        'tab_name',
        'publish',
        'position',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
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
