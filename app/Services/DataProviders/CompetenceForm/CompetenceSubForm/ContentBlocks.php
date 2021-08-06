<?php

namespace App\Services\DataProviders\CompetenceForm\CompetenceSubForm;

use App\Http\Controllers\Admin\Relations\Competencies\ContentBlocksController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\Competencies\CompetenceContentBlock\CompetenceContentBlockRepository;

final class ContentBlocks extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = ContentBlocksController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(CompetenceContentBlockRepository::class);
    }
}
