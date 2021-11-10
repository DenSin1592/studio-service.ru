<?php

namespace App\Services\Copier;

use App\Http\Controllers\Admin\Relations\Services\BeforeAfterImagesController;
use App\Http\Controllers\Admin\Relations\Services\CompetenciesController;
use App\Http\Controllers\Admin\Relations\Services\FaqQuestionsController;
use App\Http\Controllers\Admin\Relations\Services\ProjectsController;
use App\Http\Controllers\Admin\Relations\Services\ReviewsController;
use App\Http\Controllers\Admin\Relations\Services\ContentBlocksController;
use App\Http\Controllers\Admin\Relations\Services\TabsController;
use App\Http\Controllers\Admin\Relations\Services\TasksController;
use App\Services\Copier\Core\Copier;
use App\Services\Repositories\Services\ServicesRepository;

class ServiceCopier extends Copier
{

    protected function setRepository(): void
    {
        $this->repository = \App::make(ServicesRepository::class);
    }


    protected function afterSave(): void
    {
        $this->copyOneToMany(ContentBlocksController::RELATIONS_NAME,);
        $this->copyOneToMany(TabsController::RELATIONS_NAME, 'contentBlocks');
        $this->copyOneToMany(TasksController::RELATIONS_NAME,);
        $this->copyOneToMany(FaqQuestionsController::RELATIONS_NAME,);
        $this->copyManyToMany(CompetenciesController::RELATIONS_NAME);
        $this->copyManyToMany(BeforeAfterImagesController::RELATIONS_NAME);
        $this->copyManyToMany(ReviewsController::RELATIONS_NAME);
        $this->copyManyToMany(ProjectsController::RELATIONS_NAME);
    }
}


