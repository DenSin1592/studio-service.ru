<?php

namespace App\Http\Controllers\Admin\Relations\Services;

use App\Http\Controllers\Admin\Relations\BaseManyToManyRelationsController;
use App\Services\Repositories\OurWork\OurWorkRepository;

final class ProjectsController extends BaseManyToManyRelationsController
{
    public const BLOCK_NAME = 'Проекты';
    public const RELATIONS_NAME = 'ourWorks';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\EssenceControllers\OurWorksController::ROUTE_EDIT;
    public const ROUTE_AVAILABLE = 'cc.services.our-works.available';
    public const ROUTE_REBUILD_CURRENT = 'cc.services.our-works.rebuild-current';

   protected function setRepository(): void
   {
       $this->repository = \App(OurWorkRepository::class);
   }
}
