<?php

namespace App\Http\Controllers\Admin\Relations\Reviews;

use App\Http\Controllers\Admin\Relations\BaseManyToManyRelationsController;
use App\Services\Repositories\Services\ServicesRepository;

class ServicesController extends BaseManyToManyRelationsController
{
    public const BLOCK_NAME = 'Услуги';
    public const RELATIONS_NAME = 'services';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\EssenceControllers\ServicesController::ROUTE_EDIT;
    public const ROUTE_AVAILABLE = 'cc.reviews.services.available';
    public const ROUTE_REBUILD_CURRENT = 'cc.reviews.services.rebuild-current';

    protected function setRepository()
    {
        $this->repository = \App(ServicesRepository::class);
    }
}
