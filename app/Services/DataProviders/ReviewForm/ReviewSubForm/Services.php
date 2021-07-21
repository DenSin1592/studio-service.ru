<?php

namespace App\Services\DataProviders\ReviewForm\ReviewSubForm;

use App\Http\Controllers\Admin\Relations\Reviews\ServicesController;
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
