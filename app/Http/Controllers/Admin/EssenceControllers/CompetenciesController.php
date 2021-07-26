<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Admin\BaseEssenceController;
use App\Http\Controllers\Client\EssenceControllers\CompetenceController;
use App\Services\DataProviders\CompetenceForm\CompetenceForm;
use App\Services\FormProcessors\Competence\CompetenceFormProcessor;
use App\Services\Repositories\Competencies\CompetenciesRepository;

class CompetenciesController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.competencies.index';
    protected const  ROUTE_CREATE = 'cc.competencies.create';
    protected const  ROUTE_STORE = 'cc.competencies.store';
    public const  ROUTE_EDIT = 'cc.competencies.edit';
    protected const  ROUTE_UPDATE = 'cc.competencies.update';
    protected const  ROUTE_DESTROY = 'cc.competencies.destroy';
    protected const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.competencies.toggle-attribute';
    protected const  ROUTE_UPDATE_POSITIONS = 'cc.competencies.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.competencies.create';
    public const BREADCRUMBS_EDIT = 'cc.competencies.edit';

    protected const VIEW_HEADER_FIELD_NAME = 'admin.essence.competencies._header_fields';
    protected const VIEW_LIST = 'admin.essence.competencies._list';
    protected const VIEW_FORM_FIELDS = 'admin.essence.competencies._form_fields';

    protected const INDEX_TITLE = 'Каталог компетенций';

    protected const CREATE_MESSAGE = 'Компетенция создана';
    protected const EDIT_MESSAGE = 'Компетенция обновлена';
    protected const DESTROY_MESSAGE = 'Компетенция удалена';

    public const ESSENCE_NAME = 'competence';

    protected function setDependencies(): void
    {
        $this->repository = \App(CompetenciesRepository::class);
        $this->formDataProvider = \App(CompetenceForm::class);
        $this->formProcessor = \App(CompetenceFormProcessor::class);
        $this->urlShowONSite = CompetenceController::ROUTE_SHOW_ON_SITE;
    }


}
