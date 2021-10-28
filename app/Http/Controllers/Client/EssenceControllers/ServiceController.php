<?php

namespace App\Http\Controllers\Client\EssenceControllers;

use App\Http\Controllers\Admin\EssenceControllers\ServicesController;
use App\Http\Controllers\Client\BaseEssenceController;
use App\Services\Repositories\Services\ServicesRepository;
use Illuminate\Database\Eloquent\Model;

class ServiceController extends BaseEssenceController
{
    public const ROUTE_SHOW_ON_SITE = 'service';

    protected const VIEW_FOR_SHOW = 'client.catalog_essence.service.show';
    protected const AUTH_EDIT_LINK = ServicesController::ROUTE_EDIT;

    protected function setRepository(): void
    {
        $this->repository = \App(ServicesRepository::class);
    }

    protected function getBreadCrumbs(string $h1, Model $model)
    {
        $breadcrumbs = $this->breadcrumbs->init();
        $breadcrumbs->add('Решения', route('services'));
        $breadcrumbs->add($h1);

        return $breadcrumbs;
    }

    public function getModelsForServicePage()
    {
        return $this->repository->getModelsForServicePage();
    }
}
