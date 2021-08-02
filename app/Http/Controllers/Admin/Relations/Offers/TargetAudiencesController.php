<?php

namespace App\Http\Controllers\Admin\Relations\Offers;

use App\Http\Controllers\Admin\Relations\BaseBelongsToController;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;

class TargetAudiencesController extends BaseBelongsToController
{
    public const RELATIONS_NAME = 'targetAudience';
    public const ROUTE_SEARCH = 'cc.offers.target-audiences.search';
    public const ROUTE_EDIT = \App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController::ROUTE_EDIT;
    public const ROUTE_SHOW_ON_SITE = \App\Http\Controllers\Client\EssenceControllers\TargetAudienceController::ROUTE_SHOW_ON_SITE;

    protected function setRepository(): void
    {
        $this->repository = \App(TargetAudienceRepository::class);
    }
}
