<?php

namespace App\Http\Controllers\Admin\Relations\Services;

use App\Http\Controllers\Admin\Relations\BaseOneToManyController;
use App\Services\Repositories\Services\ServiceFaqQuestion\ServiceFaqQuestionRepository;

final class FaqQuestionsController extends BaseOneToManyController
{
    public const RELATIONS_NAME = 'faqQuestions';
    public const ROUTE_CREATE = 'cc.services.faq-questions.create';
    protected const VIEW_ELEMENT_NAME = 'admin.essence.services._faq_questions._content_block';

    protected function setRepository(): void
    {
        $this->repository = \App(ServiceFaqQuestionRepository::class);
    }
}
