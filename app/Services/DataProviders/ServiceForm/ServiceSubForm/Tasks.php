<?php

namespace App\Services\DataProviders\ServiceForm\ServiceSubForm;

use App\Http\Controllers\Admin\Relations\Services\TasksController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\Services\ServiceTask\ServiceTaskRepository;

final class Tasks extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = TasksController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(ServiceTaskRepository::class);
    }
}
