<?php

namespace App\Http\Controllers\Client\EssenceControllers;

use App\Http\Controllers\Admin\EssenceControllers\OffersController;
use App\Http\Controllers\Client\BaseEssenceController;
use App\Services\Repositories\Offer\OfferRepository;

class OfferController extends BaseEssenceController
{
    public const ROUTE_SHOW_ON_SITE = 'offer';

    protected const VIEW_FOR_SHOW = 'client.catalog_essence.offer.show';
    protected const AUTH_EDIT_LINK = OffersController::ROUTE_EDIT;

    protected function setRepository(): void
    {
        $this->repository = \App(OfferRepository::class);
    }

    protected function getBreadCrumbs(string $h1)
    {
        $breadcrumbs = $this->breadcrumbs->init();
        //$breadcrumbs->add('Офферы', route(''));
        $breadcrumbs->add($h1);

        return $breadcrumbs;
    }
}
