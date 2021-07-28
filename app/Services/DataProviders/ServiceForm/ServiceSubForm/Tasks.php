<?php

namespace App\Services\DataProviders\ServiceForm\ServiceSubForm;

use App\Http\Controllers\Admin\Relations\Services\TasksController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\TargetAudience\ServiceTask\ServiceTaskRepository;
use Illuminate\Database\Eloquent\Model;

final class Tasks extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = TasksController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(ServiceTaskRepository::class);
    }
}
