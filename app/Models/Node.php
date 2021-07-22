<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\TreeParentPath;
use App\Models\Helpers\DeleteHelpers;

/**
 * App\Models\Node
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $alias
 * @property string $name
 * @property boolean $publish
 * @property integer $position
 * @property boolean $menu_top
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read Node $parent
 * @property-read \Illuminate\Database\Eloquent\Collection|Node[] $children
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Node whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Node whereParentId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Node whereAlias($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Node whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Node wherePublish($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Node wherePosition($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Node whereMenuTop($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Node whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Node whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Node whereUpdatedAt($value)
 */
class Node extends \Eloquent
{
    use AutoPublish;
    use TreeParentPath;

    public const TYPE_HOME_PAGE = 'home_page';
    public const TYPE_TARGET_AUDIENCE_PAGE = 'target_audience_page';
    public const TYPE_SERVICE_PAGE = 'service_page';
    public const TYPE_COMPETENCE_PAGE = 'competence_page';
    public const TYPE_TEXT_PAGE = 'text_page';

    protected $fillable = [
        'parent_id',
        'alias',
        'name',
        'publish',
        'position',
        'type',
        'menu_top',
        'menu_bottom',
    ];

    protected $casts = [
        'publish' => 'boolean',
        'menu_top' => 'boolean',
        'menu_bottom' => 'boolean',
    ];


    public function getAliasPath(): array
    {
        $parentPath = $this->extractPath();
        $aliasPath = array_map(
            function (self $node) {
                return $node->alias;
            },
            $parentPath
        );

        return $aliasPath;
    }

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function homePage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(HomePage::class);
    }

    public function targetAudiencePage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(TargetAudiencePage::class);
    }

    public function servicePage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(ServicePage::class);
    }

    public function competencePage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(CompetencePage::class);
    }

    public function textPage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(TextPage::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function (self $model) {
            DeleteHelpers::deleteRelatedAll($model->children());
            DeleteHelpers::deleteRelatedFirst($model->homePage());
            DeleteHelpers::deleteRelatedFirst($model->targetAudiencePage());
            DeleteHelpers::deleteRelatedFirst($model->servicePage());
            DeleteHelpers::deleteRelatedFirst($model->competencePage());
            DeleteHelpers::deleteRelatedAll($model->textPage());
        });
    }
}
