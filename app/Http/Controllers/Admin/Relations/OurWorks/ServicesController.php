<?php

namespace App\Http\Controllers\Admin\Relations\OurWorks;

use App\Http\Controllers\Admin\Relations\BaseManyToManyRelationsController;
use App\Services\Repositories\Services\ServicesRepository;

final class ServicesController extends BaseManyToManyRelationsController
{
    public const BLOCK_NAME = 'Услуги';
    public const RELATIONS_NAME = 'services';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\EssenceControllers\ServicesController::ROUTE_EDIT;
    public const ROUTE_AVAILABLE = 'cc.our-works.services.available';
    public const ROUTE_REBUILD_CURRENT = 'cc.our-works.services.rebuild-current';

    protected function setRepository(): void
    {
        $this->repository = \App(ServicesRepository::class);
    }
}
