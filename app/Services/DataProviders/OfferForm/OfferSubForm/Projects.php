<?php

namespace App\Services\DataProviders\OfferForm\OfferSubForm;

use App\Http\Controllers\Admin\Relations\Offers\ProjectsController;
use App\Services\DataProviders\BaseManyToManySubForm;
use App\Services\Repositories\OurWork\OurWorkRepository;

class Projects extends BaseManyToManySubForm
{
    protected const SUB_FORM_NAME = ProjectsController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(OurWorkRepository::class);
    }
}
