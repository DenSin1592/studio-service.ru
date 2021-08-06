<?php

namespace App\Http\Controllers\Client\EssenceControllers;

use App\Http\Controllers\Admin\EssenceControllers\OurWorksController;
use App\Http\Controllers\Client\BaseEssenceController;
use App\Services\Repositories\OurWork\OurWorkRepository;

class OurWorkController extends BaseEssenceController
{
    public const ROUTE_SHOW_ON_SITE = 'our-work';

    protected const VIEW_FOR_SHOW = 'client.catalog_essence.our_work.show';
    protected const AUTH_EDIT_LINK = OurWorksController::ROUTE_EDIT;

    protected function setRepository(): void
    {
        $this->repository = \App(OurWorkRepository::class);
    }

    protected function getBreadCrumbs(string $h1)
    {
        $breadcrumbs = $this->breadcrumbs->init();
        $breadcrumbs->add('Проекты');
        $breadcrumbs->add($h1);

        return $breadcrumbs;
    }
}
