<?php

namespace App\Http\Controllers\Admin\Relations\Offers;

use App\Http\Controllers\Admin\Relations\BaseManyToManyRelationsController;
use App\Services\Repositories\Review\ReviewRepository;

final class ReviewsController extends BaseManyToManyRelationsController
{
    public const BLOCK_NAME = 'Отзывы';
    public const RELATIONS_NAME = 'reviews';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\EssenceControllers\ReviewsController::ROUTE_EDIT;
    public const ROUTE_AVAILABLE = 'cc.offers.reviews.available';
    public const ROUTE_REBUILD_CURRENT = 'cc.offers.reviews.rebuild-current';

   protected function setRepository(): void
   {
       $this->repository = \App(ReviewRepository::class);
   }
}
