<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\TreeParentPath;
use App\Models\Helpers\AliasHelpers;
use App\Models\Helpers\DeleteHelpers;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use AutoPublish;
    use TreeParentPath;

    public const TYPE_HOME_PAGE = 'home_page';
    public const TYPE_TARGET_AUDIENCE_PAGE = 'target_audience_page';
    public const TYPE_SERVICE_PAGE = 'service_page';
    //public const TYPE_REVIEW_PAGE = 'review_page';
    public const TYPE_OUR_WORK_PAGE = 'our_work_page';
    public const TYPE_COMPETENCE_PAGE = 'competence_page';
    public const TYPE_OFFER_PAGE = 'offer_page';
    public const TYPE_TEXT_PAGE = 'text_page';

    public const HOME_PAGE_ID = 1;

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
        return array_map(static function (self $node) {
            if (\TypeContainer::getTypeList()[$node->type]->getUnique()) {
                return \TypeContainer::getClientUrl($node, false);
            }
            return  $node->alias;
        }, $parentPath);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function homePage()
    {
        return $this->hasOne(HomePage::class);
    }

    public function targetAudiencePage()
    {
        return $this->hasOne(TargetAudiencePage::class);
    }

    public function servicePage()
    {
        return $this->hasOne(ServicePage::class);
    }

    public function ourWorkPage()
    {
        return $this->hasOne(OurWorkPage::class);
    }

   /* public function ReviewPage()
    {
        return $this->hasOne(ReviewPage::class);
    }*/

    public function competencePage()
    {
        return $this->hasOne(CompetencePage::class);
    }

    public function textPage()
    {
        return $this->hasOne(TextPage::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        static::deleting(function (self $model) {
            \DB::transaction(function() use ($model) {
                DeleteHelpers::deleteRelatedAll($model->children());
                DeleteHelpers::deleteRelatedFirst($model->homePage());
                DeleteHelpers::deleteRelatedFirst($model->targetAudiencePage());
                DeleteHelpers::deleteRelatedFirst($model->servicePage());
                //DeleteHelpers::deleteRelatedFirst($model->reviewPage());
                DeleteHelpers::deleteRelatedFirst($model->ourWorkPage());
                DeleteHelpers::deleteRelatedFirst($model->competencePage());
                DeleteHelpers::deleteRelatedFirst($model->textPage());
            });
        });

        self::saving(static function (self $model) {
            AliasHelpers::setAlias($model);
            if (\TypeContainer::getTypeList()[$model->type]->getUnique()) {
                $model->alias = trim(\TypeContainer::getClientUrl($model, false), '/');
            }
        });
    }
}
