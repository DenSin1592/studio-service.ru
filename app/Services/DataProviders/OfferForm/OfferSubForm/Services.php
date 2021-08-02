<?php

namespace App\Services\DataProviders\OfferForm\OfferSubForm;


use App\Http\Controllers\Admin\Relations\Offers\ServicesController;
use App\Services\DataProviders\BaseBelongsToSubForm;
use App\Services\Repositories\Services\ServicesRepository;

final class Services extends BaseBelongsToSubForm
{
    protected const SUB_FORM_NAME = ServicesController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(ServicesRepository::class);
    }
}
