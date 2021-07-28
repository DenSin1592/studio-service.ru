<?php

namespace App\Services\DataProviders\ReviewForm\ReviewSubForm;

use App\Http\Controllers\Admin\Relations\Reviews\ServicesController;
use App\Services\DataProviders\BaseManyToManySubForm;
use App\Services\Repositories\Services\ServicesRepository;

final class Services extends BaseManyToManySubForm
{
    protected const SUB_FORM_NAME = ServicesController::RELATIONS_NAME;

    protected function setRepository()
    {
        $this->repository = \App(ServicesRepository::class);
    }
}
