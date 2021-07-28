<?php

namespace App\Http\Controllers\Admin\Relations\Reviews;

use App\Http\Controllers\Admin\Relations\BaseOneToManyController;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;

final class ImagesController extends BaseOneToManyController
{
    public const RELATIONS_NAME = 'images';
    public const ROUTE_CREATE = 'cc.reviews.reviews-images.create';
    protected const VIEW_ELEMENT_NAME = 'admin.shared._images._image';

    protected function setRepository(): void
    {
        $this->repository = \App(ReviewImageRepository::class);
    }
}
