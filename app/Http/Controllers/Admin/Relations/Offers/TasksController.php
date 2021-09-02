<?php

namespace App\Http\Controllers\Admin\Relations\Offers;

use App\Http\Controllers\Admin\Relations\BaseOneToManyController;
use App\Services\Repositories\Services\ServiceTask\ServiceTaskRepository;

final class TasksController extends BaseOneToManyController
{
    public const RELATIONS_NAME = 'tasks';
    public const ROUTE_CREATE = 'cc.offers.tasks.create';
    protected const VIEW_ELEMENT_NAME = 'admin.essence.offers._tasks._content_block';

    protected function setRepository(): void
    {
        $this->repository = \App(ServiceTaskRepository::class);
    }
}
