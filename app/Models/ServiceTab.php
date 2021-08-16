<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use Illuminate\Database\Eloquent\Model;

class ServiceTab extends Model
{
    use AutoPublish;

    protected $table = "service_tabs_block_tabs";

    protected $fillable = [
        'tab_name',
        'content',
        'publish',
        'position',
        'service_id',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
