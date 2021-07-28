<?php

namespace App\Http\Controllers\Admin\Relations\Services;

use App\Http\Controllers\Controller;
use App\Services\Repositories\TargetAudience\ServiceTask\ServiceTaskRepository;

class TasksController extends Controller
{
    public const RELATIONS_NAME = 'tasks';
    public const ROUTE_CREATE = 'cc.services.tasks.create';

    public function __construct(
        private ServiceTaskRepository $repository
    ){}

    public function create()
    {
        $key = \Request::get('key');
        $elem = $this->repository->newInstance();
        $view = view(
            'admin.essence.services._tasks._content_block',
            [
                'key' => $key,
                'elem' => $elem,
            ]
        )->render();

        return \Response::json(['element' => $view]);
    }
}
