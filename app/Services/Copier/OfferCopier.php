<?php

namespace App\Services\Copier;

use App\Http\Controllers\Admin\Relations\Offers\BeforeAfterImagesController;
use App\Http\Controllers\Admin\Relations\Offers\CompetenciesController;
use App\Http\Controllers\Admin\Relations\Offers\FaqQuestionsController;
use App\Http\Controllers\Admin\Relations\Offers\ProjectsController;
use App\Http\Controllers\Admin\Relations\Offers\ReviewsController;
use App\Http\Controllers\Admin\Relations\Offers\ContentBlocksController;
use App\Http\Controllers\Admin\Relations\Offers\TabsController;
use App\Http\Controllers\Admin\Relations\Offers\TasksController;
use App\Services\Copier\Core\Copier;

class OfferCopier extends Copier
{

    protected function setFieldsForCopy(): void
    {
        $this->fieldsForCopy = [
            'name',
            'service_id',
            'target_audience_id',
            'position',
            'header',
            'meta_title',
            'meta_description',
            'meta_keywords',
            'achievements_block',
            'section_tasks_name',
            'section_tasks_publish',
            'section_video_name',
            'section_video_link_youtube',
            'section_video_publish',
            'section_tabs_name',
            'section_tabs_description',
            'section_tabs_publish',
            'section_requirements_name',
            'section_requirements_content',
            'section_requirements_publish',
            'section_faq_name',
            'section_faq_publish',
            'section_prices_name',
            'section_prices_content',
            'section_prices_publish',
            'section_advantages_content',
            'section_advantages_publish',
            'section_feedback_name',
            'section_feedback_publish',
            'section_competencies_name',
            'section_competencies_publish',
            'section_offers_name',
            'section_offers_publish',
            'section_reviews_publish',
            'section_projects_publish',
        ];
    }


    protected function afterSave(): void
    {
        $this->copyOneToMany(ContentBlocksController::RELATIONS_NAME, ['name', 'content', 'publish', 'position',]);
        $this->copyOneToMany(TabsController::RELATIONS_NAME, ['tab_name', 'content', 'publish', 'position',]);
        $this->copyOneToMany(TasksController::RELATIONS_NAME, ['title', 'text', 'publish', 'position', 'description',]);
        $this->copyOneToMany(FaqQuestionsController::RELATIONS_NAME, ['name', 'content', 'publish', 'position',]);
        $this->copyManyToMany(CompetenciesController::RELATIONS_NAME);
        $this->copyManyToMany(BeforeAfterImagesController::RELATIONS_NAME);
        $this->copyManyToMany(ReviewsController::RELATIONS_NAME);
        $this->copyManyToMany(ProjectsController::RELATIONS_NAME);
    }
}


