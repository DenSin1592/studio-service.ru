<?php

namespace App\Http\Controllers\Client\EssenceControllers;

use App\Http\Controllers\Admin\EssenceControllers\CompetenciesController;
use App\Http\Controllers\Client\BaseEssenceController;
use App\Services\Repositories\Competencies\CompetenciesRepository;

class CompetenceController extends BaseEssenceController
{
    public const ROUTE_SHOW_ON_SITE = 'competence';

    protected const VIEW_FOR_SHOW = 'client.catalog_essence.competence.show';
    protected const AUTH_EDIT_LINK = CompetenciesController::ROUTE_EDIT;

    protected function setRepository(): void
    {
        $this->repository = \App(CompetenciesRepository::class);
    }

    protected function getBreadCrumbs(string $h1)
    {
        $breadcrumbs = $this->breadcrumbs->init();
        $breadcrumbs->add('Компетенции', route('competencies'));
        $breadcrumbs->add($h1);

        return $breadcrumbs;
    }

    public function getModelsForCompetencePage()
    {
        return $this->repository->getModelsForCompetencePage();
    }
}
