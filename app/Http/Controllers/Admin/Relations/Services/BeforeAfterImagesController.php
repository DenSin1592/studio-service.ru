<?php

namespace App\Http\Controllers\Admin\Relations\Services;

use App\Http\Controllers\Admin\Relations\BaseManyToManyRelationsController;
use App\Services\Repositories\BeforeAfterImages\BeforeAfterImagesRepository;

final class BeforeAfterImagesController extends BaseManyToManyRelationsController
{
    public const BLOCK_NAME = 'Изображения \'До/После\'';
    public const RELATIONS_NAME = 'beforeAfterImages';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\EssenceControllers\BeforeAfterImagesController::ROUTE_EDIT;
    public const ROUTE_AVAILABLE = 'cc.services.before-after-images.available';
    public const ROUTE_REBUILD_CURRENT = 'cc.services.before-after-images.rebuild-current';

   protected function setRepository(): void
   {
       $this->repository = \App(BeforeAfterImagesRepository::class);
   }
}
