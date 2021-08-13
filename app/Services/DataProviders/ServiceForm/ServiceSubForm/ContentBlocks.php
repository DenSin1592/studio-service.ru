<?php

namespace App\Services\DataProviders\ServiceForm\ServiceSubForm;

use App\Http\Controllers\Admin\Relations\Services\ContentBlocksController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\Services\ServiceContentBlock\ServiceContentBlockRepository;

final class ContentBlocks extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = ContentBlocksController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(ServiceContentBlockRepository::class);
    }
}
