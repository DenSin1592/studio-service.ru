<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\TreeParentPath;
use App\Models\Helpers\DeleteHelpers;

class TargetAudience extends \Eloquent
{
    use AutoPublish;
    use TreeParentPath;

    protected $fillable = [
        'parent_id',
        'alias',
        'name',
        'publish',
        'position',
    ];

    protected $casts = [
        'publish' => 'boolean',
    ];

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(get_called_class(), 'parent_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(get_called_class(), 'parent_id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function (self $model) {
            DeleteHelpers::deleteRelatedAll($model->children());
        });
    }
}
