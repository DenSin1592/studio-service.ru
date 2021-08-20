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


    public function getModelforShowByAliasOrFail(string $alias)
    {
        $model = $this->getModel()
            ->with([
                'contentBlocks' => static function ($q) {$q->where('publish', true)->orderBy('position');
                }])
            ->where('alias', $alias)
            ->where('publish', true)
            ->firstOrFail();

        if($model->section_tasks_publish){
            $model->load(['service.tasks' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }

        /*if($model->section_tabs_publish){
            $model->load(['tabs' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }*/

        /*if($model->section_faq_publish){
            $model->load(['faqQuestions' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }*/

        /*if($model->section_advantages_publish){
            $model->load(['beforeAfterImages' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }*/

        /*if($model->section_reviews_publish){
            $model->load(['reviews' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }*/

        /*if($model->section_projects_publish){
            $model->load(['ourWorks' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }*/

        return $model;
    }
}
