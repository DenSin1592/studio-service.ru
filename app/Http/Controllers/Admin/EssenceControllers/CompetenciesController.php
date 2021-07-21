<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Admin\BaseEssenceController;
use App\Services\DataProviders\CompetenceForm\CompetenceForm;
use App\Services\FormProcessors\Competence\CompetenceFormProcessor;
use App\Services\Repositories\Competencies\CompetenciesRepository;

class CompetenciesController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.competencies.index';
    public const  ROUTE_CREATE = 'cc.competencies.create';
    public const  ROUTE_STORE = 'cc.competencies.store';
    public const  ROUTE_EDIT = 'cc.competencies.edit';
    public const  ROUTE_UPDATE = 'cc.competencies.update';
    public const  ROUTE_DESTROY = 'cc.competencies.destroy';
    public const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.competencies.toggle-attribute';
    public const  ROUTE_UPDATE_POSITIONS = 'cc.competencies.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.competencies.create';
    public const BREADCRUMBS_EDIT = 'cc.competencies.edit';

    protected const VIEW_INDEX = 'admin.competencies.index';
    protected const VIEW_CREATE = 'admin.competencies.create';
    protected const VIEW_EDIT = 'admin.competencies.edit';

    protected const CREATE_MESSAGE = 'Компетенция создана';
    protected const EDIT_MESSAGE = 'Компетенция обновлена';
    protected const DESTROY_MESSAGE = 'Компетенция удалена';

    protected function setDependencies(): void
    {
        $this->repository = \App(CompetenciesRepository::class);
        $this->formDataProvider = \App(CompetenceForm::class);
        $this->formProcessor = \App(CompetenceFormProcessor::class);
    }
}
