<?php

namespace App\Services\DataProviders\OfferForm\OfferSubForm;

use App\Http\Controllers\Admin\Relations\Offers\CompetenciesController;
use App\Services\DataProviders\BaseManyToManySubForm;
use App\Services\Repositories\Competencies\CompetenciesRepository;

class Competencies extends BaseManyToManySubForm
{
    protected const SUB_FORM_NAME = CompetenciesController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(CompetenciesRepository::class);
    }
}
