<?php

namespace App\Services\DataProviders\ServiceForm\ServiceSubForm;

use App\Http\Controllers\Admin\Relations\Services\ReviewsController;
use App\Services\DataProviders\BaseManyToManySubForm;
use App\Services\Repositories\Review\ReviewRepository;

class Reviews extends BaseManyToManySubForm
{
    protected const SUB_FORM_NAME = ReviewsController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(ReviewRepository::class);
    }
}
