<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
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
}
