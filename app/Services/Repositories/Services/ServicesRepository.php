<?php

namespace App\Services\Repositories\Services;

use App\Models\Service;
use App\Services\Repositories\BaseFeatureRepository;
use App\Services\RepositoryFeatures\CreatorWithPosition;

class ServicesRepository extends BaseFeatureRepository
{
    use CreatorWithPosition;

    protected function setModel(): void
    {
        $this->model = new Service();
    }

    public function getModelsForHomePage()
    {
        return $this->getModel()
            ->with([
                'tasks' => static function ($q) {$q->orderBy('position')->where('publish', true);},
            ])
            ->where('on_home_page', true)
            ->where('publish', true)
            ->orderBy('position')
            ->get();
    }

    public function getModelsForServicePage()
    {
        return $this->getModel()
            ->with([
                'tasks' => static function ($q) {$q->orderBy('position')->where('publish', true);},
            ])
            ->where('publish', true)
            ->orderBy('position')
            ->get();
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
            $model->load(['tasks' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
        }

        if($model->section_tabs_publish){
            $model->load(['tabs' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
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

        if($model->section_target_audiences_publish){
            $model->load(['targetAudiences' => static function ($q) {$q->orderBy('position')->where('publish', true);}]);
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
