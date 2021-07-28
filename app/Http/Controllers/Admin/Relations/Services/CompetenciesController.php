<?php

namespace App\Http\Controllers\Admin\Relations\Services;

use App\Http\Controllers\Admin\Relations\BaseManyToManyRelationsController;
use App\Services\Repositories\Competencies\CompetenciesRepository;

class CompetenciesController extends BaseManyToManyRelationsController
{
    public const BLOCK_NAME = 'Компетенции';
    public const RELATIONS_NAME = 'competencies';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\EssenceControllers\CompetenciesController::ROUTE_EDIT;
    public const ROUTE_AVAILABLE = 'cc.services.competencies.available';
    public const ROUTE_REBUILD_CURRENT = 'cc.services.competencies.rebuild-current';

   protected function setRepository()
   {
       $this->repository = \App(CompetenciesRepository::class);
   }
}
