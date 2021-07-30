<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Client\EssenceControllers\OurWorkController;
use App\Services\DataProviders\OurWorkForm\OurWorkForm;
use App\Services\FormProcessors\OurWork\OurWorkFormProcessor;
use App\Services\Repositories\OurWork\OurWorkRepository;

final class OurWorksController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.our-works.index';
    protected const  ROUTE_CREATE = 'cc.our-works.create';
    protected const  ROUTE_STORE = 'cc.our-works.store';
    public const  ROUTE_EDIT = 'cc.our-works.edit';
    protected const  ROUTE_UPDATE = 'cc.our-works.update';
    protected const  ROUTE_DESTROY = 'cc.our-works.destroy';
    protected const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.our-works.toggle-attribute';
    protected const  ROUTE_UPDATE_POSITIONS = 'cc.our-works.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.our-works.create';
    public const BREADCRUMBS_EDIT = 'cc.our-works.edit';

    protected const VIEW_HEADER_FIELD_NAME = 'admin.essence.our_works._header_fields';
    protected const VIEW_LIST = 'admin.essence.our_works._list';
    protected const VIEW_FORM_FIELDS = 'admin.essence.our_works._form_fields';

    public const INDEX_TITLE = 'Наши работы';

    protected const CREATE_MESSAGE = 'Наша работа создана';
    protected const EDIT_MESSAGE = 'Наша работа обновлена';
    protected const DESTROY_MESSAGE = 'Наша работа удалена';

    public const ESSENCE_NAME = 'our_work';

    protected function setDependencies(): void
    {
        $this->repository = \App(OurWorkRepository::class);
        $this->formDataProvider = \App(OurWorkForm::class);
        $this->formProcessor = \App(OurWorkFormProcessor::class);
        $this->urlShowONSite = OurWorkController::ROUTE_SHOW_ON_SITE;
    }
}
