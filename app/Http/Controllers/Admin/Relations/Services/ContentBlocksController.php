<?php

namespace App\Http\Controllers\Admin\Relations\Services;

use App\Http\Controllers\Admin\Relations\BaseOneToManyController;
use App\Services\Repositories\Services\ServiceContentBlock\ServiceContentBlockRepository;

final class ContentBlocksController extends BaseOneToManyController
{
    public const RELATIONS_NAME = 'contentBlocks';
    public const ROUTE_CREATE = 'cc.services.content-blocks.create';
    protected const VIEW_ELEMENT_NAME = 'admin.essence.services._content_blocks._content_block';

    protected function setRepository(): void
    {
        $this->repository = \App(ServiceContentBlockRepository::class);
    }
}
