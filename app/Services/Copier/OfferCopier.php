<?php

namespace App\Services\Copier;

use App\Http\Controllers\Admin\Relations\Offers\BeforeAfterImagesController;
use App\Http\Controllers\Admin\Relations\Offers\CompetenciesController;
use App\Http\Controllers\Admin\Relations\Offers\FaqQuestionsController;
use App\Http\Controllers\Admin\Relations\Offers\ProjectsController;
use App\Http\Controllers\Admin\Relations\Offers\ReviewsController;
use App\Http\Controllers\Admin\Relations\Offers\ContentBlocksController;
use App\Http\Controllers\Admin\Relations\Offers\TabsContentBlockController;
use App\Http\Controllers\Admin\Relations\Offers\TabsController;
use App\Http\Controllers\Admin\Relations\Offers\TasksController;
use App\Services\Copier\Core\Copier;
use App\Services\Repositories\Offer\OfferRepository;

class OfferCopier extends Copier
{

    protected function setRepository(): void
    {
        $this->repository = \App::make(OfferRepository::class);
    }


    protected function afterSave(): void
    {
        $this->copyOneToMany(ContentBlocksController::RELATIONS_NAME);
        $this->copyOneToMany(TabsController::RELATIONS_NAME, 'contentBlocks');
        $this->copyOneToMany(TasksController::RELATIONS_NAME);
        $this->copyOneToMany(FaqQuestionsController::RELATIONS_NAME);
        $this->copyManyToMany(CompetenciesController::RELATIONS_NAME);
        $this->copyManyToMany(BeforeAfterImagesController::RELATIONS_NAME);
        $this->copyManyToMany(ReviewsController::RELATIONS_NAME);
        $this->copyManyToMany(ProjectsController::RELATIONS_NAME);
    }
}


