<?php

namespace App\Services\DataProviders\ServiceForm\ServiceSubForm;

use App\Http\Controllers\Admin\Relations\Services\TasksController;
use App\Services\DataProviders\BaseSubForm;
use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\TargetAudience\ServiceTask\ServiceTaskRepository;
use Illuminate\Database\Eloquent\Model;

class Tasks extends BaseSubForm
{
    protected const SUB_FORM_NAME = TasksController::RELATIONS_NAME;

    private BaseRepository $repository;

    public function __construct()
    {
        $this->setRepository();
    }

    protected function setRepository()
    {
        $this->repository = \App(ServiceTaskRepository::class);
    }


    public function provideData(Model $model, array $oldInput): array
    {
        $models = $this->repository->allForModel($model);
        return [self::SUB_FORM_NAME => $models];
    }
}
