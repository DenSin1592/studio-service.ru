<?php

namespace App\Http\Controllers\Admin\Relations\Services;

use App\Http\Controllers\Admin\Relations\BaseOneToManyController;
use App\Services\Repositories\Services\ServiceTab\ServiceTabRepository;

final class TabsController extends BaseOneToManyController
{
    public const RELATIONS_NAME = 'tabs';
    public const ROUTE_CREATE = 'cc.services.tabs.create';
    protected const VIEW_ELEMENT_NAME = 'admin.essence.services._tabs._content_block';

    protected function setRepository(): void
    {
        $this->repository = \App(ServiceTabRepository::class);
    }
}
