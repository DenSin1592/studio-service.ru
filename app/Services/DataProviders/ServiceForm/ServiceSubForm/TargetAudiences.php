<?php

namespace App\Services\DataProviders\ServiceForm\ServiceSubForm;

use App\Http\Controllers\Admin\Relations\Services\TargetAudiencesController;
use App\Services\DataProviders\BaseManyToManySubForm;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;

class TargetAudiences extends BaseManyToManySubForm
{
    protected const SUB_FORM_NAME = TargetAudiencesController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(TargetAudienceRepository::class);
    }
}
