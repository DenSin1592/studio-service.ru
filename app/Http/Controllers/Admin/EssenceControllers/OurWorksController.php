<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Admin\BaseEssenceController;
use App\Services\DataProviders\OurWorkForm\OurWorkForm;
use App\Services\FormProcessors\OurWork\OurWorkFormProcessor;
use App\Services\Repositories\OurWork\OurWorkRepository;

class OurWorksController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.our-works.index';
    public const  ROUTE_CREATE = 'cc.our-works.create';
    public const  ROUTE_STORE = 'cc.our-works.store';
    public const  ROUTE_EDIT = 'cc.our-works.edit';
    public const  ROUTE_UPDATE = 'cc.our-works.update';
    public const  ROUTE_DESTROY = 'cc.our-works.destroy';
    public const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.our-works.toggle-attribute';
    public const  ROUTE_UPDATE_POSITIONS = 'cc.our-works.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.our-works.create';
    public const BREADCRUMBS_EDIT = 'cc.our-works.edit';

    protected const VIEW_INDEX = 'admin.our_works.index';
    protected const VIEW_CREATE = 'admin.our_works.create';
    protected const VIEW_EDIT = 'admin.our_works.edit';

    protected const CREATE_MESSAGE = 'Наша работа создана';
    protected const EDIT_MESSAGE = 'Наша работа обновлена';
    protected const DESTROY_MESSAGE = 'Наша работа удалена';

    protected function setDependencies(): void
    {
        $this->repository = \App(OurWorkRepository::class);
        $this->formDataProvider = \App(OurWorkForm::class);
        $this->formProcessor = \App(OurWorkFormProcessor::class);
    }
}
