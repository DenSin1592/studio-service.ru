<?php

namespace App\Services\DataProviders\OfferForm\OfferSubForm;

use App\Http\Controllers\Admin\Relations\Offers\TabsController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\Offer\OfferTab\OfferTabRepository;

final class Tabs extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = TabsController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(OfferTabRepository::class);
    }
}
