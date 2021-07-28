<?php

namespace App\Services\DataProviders\OurWorkForm\OurWorkSubForm;

use App\Http\Controllers\Admin\Relations\OurWorks\ImagesController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\OurWork\OurWorkImage\OurWorkImageRepository;

final class Images extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = ImagesController::RELATIONS_NAME;

    protected function setRepository()
    {
        $this->repository = \App(OurWorkImageRepository::class);
    }
}
