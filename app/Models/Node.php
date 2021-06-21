<?php namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\InTreePublish;
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
 * @property boolean $in_tree_publish
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
    use InTreePublish;
    use AutoPublish;
    use TreeParentPath;

    public const TYPE_HOME_PAGE = 'home_page';
    public const TYPE_TARGET_AUDIENCE_PAGE = 'target_audience_page';
    //const TYPE_TEXT_PAGE = 'text_page';

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
    ];

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(get_called_class(), 'parent_id');
    }

    public function children(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(get_called_class(), 'parent_id');
    }

    public function homePage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(HomePage::class);
    }

    public function targetAudiencePage(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(TargetAudiencePage::class);
    }

    protected static function boot() :void
    {
        parent::boot();

        static::deleting(function (self $node) {
            DeleteHelpers::deleteRelatedAll($node->children());
            DeleteHelpers::deleteRelatedFirst($node->homePage());
        });
    }
}
