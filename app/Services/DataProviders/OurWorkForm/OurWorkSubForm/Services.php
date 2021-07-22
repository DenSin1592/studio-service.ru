<?php

namespace App\Services\DataProviders\OurWorkForm\OurWorkSubForm;

use App\Http\Controllers\Admin\Relations\OurWorks\ServicesController;
use App\Services\DataProviders\BaseRelationSubForm;
use App\Services\Repositories\Services\ServicesRepository;

class Services extends BaseRelationSubForm
{
    protected const SUB_FORM_NAME = ServicesController::RELATIONS_NAME;

    protected function setRepository()
    {
        $this->repository = \App(ServicesRepository::class);
    }
}
