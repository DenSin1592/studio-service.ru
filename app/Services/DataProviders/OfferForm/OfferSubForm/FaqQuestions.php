<?php

namespace App\Services\DataProviders\OfferForm\OfferSubForm;

use App\Http\Controllers\Admin\Relations\Offers\FaqQuestionsController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\Offer\OfferFaqQuestion\OfferFaqQuestionRepository;

final class FaqQuestions extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = FaqQuestionsController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(OfferFaqQuestionRepository::class);
    }
}
