<?php

namespace App\Http\Controllers\Admin\Relations\Reviews;

use App\Http\Controllers\Admin\Relations\BaseRelationsController;
use App\Services\Repositories\Services\ServicesRepository;

class ServicesController extends BaseRelationsController
{
    public const BLOCK_NAME = 'Услуги';
    public const RELATIONS_NAME = 'services';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\ServicesController::ROUTE_EDIT;
    public const ROUTE_AVAILABLE = 'cc.reviews.services.available';
    public const ROUTE_REBUILD_CURRENT = 'cc.reviews.services.rebuild-current';

    public function __construct(ServicesRepository $repository)
    {
        $this->repository = $repository;
    }
}
