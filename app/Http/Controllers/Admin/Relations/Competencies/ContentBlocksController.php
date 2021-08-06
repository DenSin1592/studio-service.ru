<?php

namespace App\Http\Controllers\Admin\Relations\Competencies;

use App\Http\Controllers\Admin\Relations\BaseOneToManyController;
use App\Services\Repositories\Competencies\CompetenceContentBlock\CompetenceContentBlockRepository;

final class ContentBlocksController extends BaseOneToManyController
{
    public const RELATIONS_NAME = 'contentBlocks';
    public const ROUTE_CREATE = 'cc.competencies.content-blocks.create';
    protected const VIEW_ELEMENT_NAME = 'admin.essence.competencies._content_blocks._content_block';

    protected function setRepository(): void
    {
        $this->repository = \App(CompetenceContentBlockRepository::class);
    }
}
