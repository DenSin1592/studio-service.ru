<?php

namespace App\Services\DataProviders\OfferForm\OfferSubForm;

use App\Http\Controllers\Admin\Relations\Offers\TargetAudiencesController;
use App\Services\DataProviders\BaseBelongsToSubForm;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;

final class TargetAudiences extends BaseBelongsToSubForm
{
    protected const SUB_FORM_NAME = TargetAudiencesController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(TargetAudienceRepository::class);
    }
}
