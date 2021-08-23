<?php

namespace App\Services\DataProviders\OfferForm\OfferSubForm;

use App\Http\Controllers\Admin\Relations\Offers\ReviewsController;
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
