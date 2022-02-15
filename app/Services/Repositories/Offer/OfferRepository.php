<?php

namespace App\Services\Repositories\Offer;

use App\Models\Offer;
use App\Services\Repositories\BaseFeatureRepository;
use App\Services\RepositoryFeatures\CreatorWithPosition;

class OfferRepository extends BaseFeatureRepository
{
    use CreatorWithPosition;

    protected function setModel(): void
    {
        $this->model = new Offer();
    }


    public function getModelForShowByAlias(string $alias): Offer
    {
        $model = $this->getModel()
         ->whereHas('service', static function ($q) { $q->where('publish', true); })
         ->whereHas('targetAudience', function ($q) { $q->where('publish', true); })
            ->with([
                'contentBlocks' => static function ($q) {$q->where('publish', true)->orderBy('position');
                }])
            ->where('alias', $alias)
            ->where('publish', true)
            ->first() ?? $this->getModel();

        if($model->section_tasks_publish){
            $model->load(['tasks' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }

        if($model->section_tabs_publish){
            $model->load(['tabs' => static function ($q) {$q->with(['contentBlocks' => static function($q){
                $q->orderBy('position')->where('publish', true);
            }])->orderBy('position')->where('publish', true);}]);
        }

        if($model->section_faq_publish){
            $model->load(['faqQuestions' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }

        if($model->section_advantages_publish){
            $model->load(['beforeAfterImages' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }

        if($model->section_competencies_publish){
            $model->load(['competencies' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }

        if($model->section_reviews_publish){
            $model->load(['reviews' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }

        if($model->section_projects_publish){
            $model->load(['ourWorks' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }

        return $model;
    }
}
