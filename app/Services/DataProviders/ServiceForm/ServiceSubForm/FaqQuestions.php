<?php

namespace App\Services\DataProviders\ServiceForm\ServiceSubForm;

use App\Http\Controllers\Admin\Relations\Services\FaqQuestionsController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\Services\ServiceFaqQuestion\ServiceFaqQuestionRepository;

final class FaqQuestions extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = FaqQuestionsController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(ServiceFaqQuestionRepository::class);
    }
}
