<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\TreeParentPath;
use App\Models\Helpers\AliasHelpers;
use App\Models\Helpers\DeleteHelpers;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Diol\FileclipExif\Glue;

class TargetAudience extends \Eloquent
{
    use Glue;
    use AutoPublish;
    use TreeParentPath;

    protected $fillable = [
        'parent_id',
        'alias',
        'name',
        'publish',
        'position',
        'icon_file',
        'icon_remove',
        'header',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'publish' => 'boolean',
    ];

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function (self $model) {
            DeleteHelpers::deleteRelatedAll($model->children());
        });

        self::mountUploader(
            'icon',
            UploaderIntegrator::getUploader(
                'uploads/target-audience/icons', [
                    'thumb' => new BoxVersion(85, 85, ['quality' => 100])
                ], true
            )
        );

        self::saving(function (self $model) {
            AliasHelpers::setAlias($model);
        });
    }
}
