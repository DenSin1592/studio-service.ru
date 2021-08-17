<?php

namespace App\Http\Controllers\Admin\Relations\Services;

use App\Http\Controllers\Admin\Relations\BaseManyToManyRelationsController;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;

final class TargetAudiencesController extends BaseManyToManyRelationsController
{
    public const BLOCK_NAME = 'ЦА';
    public const RELATIONS_NAME = 'targetAudiences';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController::ROUTE_EDIT;
    public const ROUTE_AVAILABLE = 'cc.services.target-audience.available';
    public const ROUTE_REBUILD_CURRENT = 'cc.services.target-audience.rebuild-current';

   protected function setRepository(): void
   {
       $this->repository = \App(TargetAudienceRepository::class);
   }
}
