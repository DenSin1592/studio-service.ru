<?php

namespace App\Services\DataProviders\ServiceForm\ServiceSubForm;

use App\Http\Controllers\Admin\Relations\Services\CompetenciesController;
use App\Services\DataProviders\BaseManyToManySubForm;
use App\Services\Repositories\Competencies\CompetenciesRepository;

class Competencies extends BaseManyToManySubForm
{
    protected const SUB_FORM_NAME = CompetenciesController::RELATIONS_NAME;

    protected function setRepository()
    {
        $this->repository = \App(CompetenciesRepository::class);
    }
}
