<?php

namespace App\Http\Controllers\Admin\Relations\Offers;

use App\Http\Controllers\Admin\Relations\BaseBelongsToController;
use App\Services\Repositories\Services\ServicesRepository;

class ServicesController extends BaseBelongsToController
{
    public const RELATIONS_NAME = 'service';
    public const ROUTE_SEARCH = 'cc.offers.services.search';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\EssenceControllers\ServicesController::ROUTE_EDIT;
    public const ROUTE_SHOW_ON_SITE = \App\Http\Controllers\Client\EssenceControllers\ServiceController::ROUTE_SHOW_ON_SITE;

    protected function setRepository(): void
    {
        $this->repository = \App(ServicesRepository::class);
    }
}
