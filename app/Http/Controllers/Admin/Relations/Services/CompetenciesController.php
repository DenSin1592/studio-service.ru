<?php

namespace App\Http\Controllers\Admin\Relations\Services;

use App\Http\Controllers\Admin\Relations\BaseRelationsController;
use App\Services\Repositories\Competencies\CompetenciesRepository;

class CompetenciesController extends BaseRelationsController
{
    public const BLOCK_NAME = 'Компетенции';
    public const RELATIONS_NAME = 'competencies';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\CompetenciesController::ROUTE_EDIT;
    public const ROUTE_AVAILABLE = 'cc.services.competencies.available';
    public const ROUTE_REBUILD_CURRENT = 'cc.services.competencies.rebuild-current';

    public function __construct(CompetenciesRepository $repository)
    {
        $this->repository = $repository;
    }
}
