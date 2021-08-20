<?php

namespace App\Http\Controllers\Admin\Relations\Offers;

use App\Http\Controllers\Admin\Relations\BaseOneToManyController;
use App\Services\Repositories\Offer\OfferContentBlock\OfferContentBlockRepository;

final class ContentBlocksController extends BaseOneToManyController
{
    public const RELATIONS_NAME = 'contentBlocks';
    public const ROUTE_CREATE = 'cc.offers.content-blocks.create';
    protected const VIEW_ELEMENT_NAME = 'admin.essence.offers._content_blocks._content_block';

    protected function setRepository(): void
    {
        $this->repository = \App(OfferContentBlockRepository::class);
    }
}
