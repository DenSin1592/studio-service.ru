<?php

namespace App\Http\Controllers\Client\EssenceControllers;

use App\Http\Controllers\Admin\EssenceControllers\OffersController;
use App\Http\Controllers\Client\BaseEssenceController;
use App\Services\Repositories\Offer\OfferRepository;
use Illuminate\Database\Eloquent\Model;

class OfferController extends BaseEssenceController
{
    public const ROUTE_SHOW_ON_SITE = 'offer';

    protected const VIEW_FOR_SHOW = 'client.catalog_essence.offer.show';
    protected const AUTH_EDIT_LINK = OffersController::ROUTE_EDIT;

    protected function setRepository(): void
    {
        $this->repository = \App(OfferRepository::class);
    }

    protected function getBreadCrumbs(string $h1, Model $model)
    {
        $breadcrumbs = $this->breadcrumbs->init();
        $breadcrumbs->add($model->service->name, route(ServiceController::ROUTE_SHOW_ON_SITE, $model->service->id));
        $breadcrumbs->add($model->targetAudience->name, route(TargetAudienceController::ROUTE_SHOW_ON_SITE, $model->targetAudience->id));
        $breadcrumbs->add($h1);

        return $breadcrumbs;
    }
}
