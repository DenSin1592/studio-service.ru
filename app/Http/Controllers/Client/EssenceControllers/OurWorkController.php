<?php

namespace App\Http\Controllers\Client\EssenceControllers;

use App\Http\Controllers\Admin\EssenceControllers\OurWorksController;
use App\Http\Controllers\Client\BaseEssenceController;
use App\Services\Repositories\OurWork\OurWorkRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class OurWorkController extends BaseEssenceController
{
    public const ROUTE_SHOW_ON_SITE = 'our-work';

    protected const VIEW_FOR_SHOW = 'client.catalog_essence.our_work.show';
    protected const AUTH_EDIT_LINK = OurWorksController::ROUTE_EDIT;

    public function show($url){
        return parent::show($url)
            ->with('projects',$this->repository->getOtherModelsForModelByAlias($url));
    }

    protected function setRepository(): void
    {
        $this->repository = \App(OurWorkRepository::class);
    }

    protected function getBreadCrumbs(string $h1, Model $model)
    {
        $breadcrumbs = $this->breadcrumbs->init();
        $breadcrumbs->add('Проекты');
        $breadcrumbs->add($h1);

        return $breadcrumbs;
    }
}
