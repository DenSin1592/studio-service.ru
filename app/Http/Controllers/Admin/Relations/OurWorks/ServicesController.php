<?php

namespace App\Http\Controllers\Admin\Relations\OurWorks;

use App\Http\Controllers\Admin\Relations\BaseRelationsController;
use App\Services\Repositories\Services\ServicesRepository;

class ServicesController extends BaseRelationsController
{
    public const BLOCK_NAME = 'Услуги';
    public const RELATIONS_NAME = 'services';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\EssenceControllers\ServicesController::ROUTE_EDIT;
    public const ROUTE_AVAILABLE = 'cc.our-works.services.available';
    public const ROUTE_REBUILD_CURRENT = 'cc.our-works.services.rebuild-current';

    public function __construct(ServicesRepository $repository)
    {
        $this->repository = $repository;
    }
}
