<?php

namespace App\Services\DataProviders\OurWorkForm\OurWorkSubForm;

use App\Http\Controllers\Admin\Relations\OurWorks\ServicesController;
use App\Services\DataProviders\BaseManyToManySubForm;
use App\Services\Repositories\Services\ServicesRepository;

final class Services extends BaseManyToManySubForm
{
    protected const SUB_FORM_NAME = ServicesController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(ServicesRepository::class);
    }
}
