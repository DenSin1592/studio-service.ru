<?php

namespace App\Http\Controllers\Client\EssenceControllers;

use App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController;
use App\Http\Controllers\Client\BaseEssenceController;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;

class TargetAudienceController extends BaseEssenceController
{
    public const ROUTE_SHOW_ON_SITE = 'target-audience';

    protected const VIEW_FOR_SHOW = 'client.catalog_essence.target_audience.show';
    protected const AUTH_EDIT_LINK = TargetAudiencesController::ROUTE_EDIT;

    protected function setRepository(): void
    {
        $this->repository = \App(TargetAudienceRepository::class);
    }

    protected function getBreadCrumbs(string $h1)
    {
        $breadcrumbs = $this->breadcrumbs->init();
        $breadcrumbs->add('Для кого', route('target-audiences'));
        $breadcrumbs->add($h1);

        return $breadcrumbs;
    }

    public function getModelsForTargetAudiencePage()
    {
        return $this->repository->getModelsForTargetAudiencePage();
    }
}
