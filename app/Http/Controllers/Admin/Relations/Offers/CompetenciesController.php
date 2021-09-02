<?php

namespace App\Http\Controllers\Admin\Relations\Offers;

use App\Http\Controllers\Admin\Relations\BaseManyToManyRelationsController;
use App\Services\Repositories\Competencies\CompetenciesRepository;

final class CompetenciesController extends BaseManyToManyRelationsController
{
    public const BLOCK_NAME = 'Компетенции';
    public const RELATIONS_NAME = 'competencies';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\EssenceControllers\CompetenciesController::ROUTE_EDIT;
    public const ROUTE_AVAILABLE = 'cc.offers.competencies.available';
    public const ROUTE_REBUILD_CURRENT = 'cc.offers.competencies.rebuild-current';

   protected function setRepository(): void
   {
       $this->repository = \App(CompetenciesRepository::class);
   }
}
