<?php

namespace App\Http\Controllers\Admin\Relations\Offers;

use App\Http\Controllers\Admin\Relations\BaseOneToManyController;
use App\Services\Repositories\Offer\OfferTab\OfferTabRepository;

final class TabsController extends BaseOneToManyController
{
    public const RELATIONS_NAME = 'tabs';
    public const ROUTE_CREATE = 'cc.offers.tabs.create';
    protected const VIEW_ELEMENT_NAME = 'admin.essence.offers._tabs._content_block';

    protected function setRepository(): void
    {
        $this->repository = \App(OfferTabRepository::class);
    }
}
