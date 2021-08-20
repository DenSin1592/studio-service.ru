<?php

namespace App\Services\Repositories\Offer\OfferFaqQuestion;

use App\Models\OfferFaqQuestion;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class OfferFaqQuestionRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new OfferFaqQuestion();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->offer();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->faqQuestions();
    }
}
