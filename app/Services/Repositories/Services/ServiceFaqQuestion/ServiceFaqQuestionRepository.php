<?php

namespace App\Services\Repositories\Services\ServiceFaqQuestion;

use App\Models\ServiceFaqQuestion;
use App\Services\Repositories\BaseOneToManyRepository;
use Illuminate\Database\Eloquent\Model;

class ServiceFaqQuestionRepository extends BaseOneToManyRepository
{
    protected function setModel(): void
    {
        $this->model = new ServiceFaqQuestion();
    }

    protected function getRelationForSubModel(Model $subModel)
    {
        return $subModel->service();
    }

    protected function getRelationForModel(Model $model)
    {
        return $model->faqQuestions();
    }
}
