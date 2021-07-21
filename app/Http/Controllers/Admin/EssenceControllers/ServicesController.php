<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Admin\BaseEssenceController;
use App\Services\DataProviders\ServiceForm\ServiceForm;
use App\Services\FormProcessors\Service\ServiceFormProcessor;
use App\Services\Repositories\Services\ServicesRepository;

class ServicesController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.services.index';
    public const  ROUTE_CREATE = 'cc.services.create';
    public const  ROUTE_STORE = 'cc.services.store';
    public const  ROUTE_EDIT = 'cc.services.edit';
    public const  ROUTE_UPDATE = 'cc.services.update';
    public const  ROUTE_DESTROY = 'cc.services.destroy';
    public const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.services.toggle-attribute';
    public const  ROUTE_UPDATE_POSITIONS = 'cc.services.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.services.create';
    public const BREADCRUMBS_EDIT = 'cc.services.edit';

    protected const VIEW_INDEX = 'admin.services.index';
    protected const VIEW_CREATE = 'admin.services.create';
    protected const VIEW_EDIT = 'admin.services.edit';

    protected const CREATE_MESSAGE = 'Услуга создан';
    protected const EDIT_MESSAGE = 'Услуга обновлена';
    protected const DESTROY_MESSAGE = 'Услуга удалена';

    protected function setDependencies(): void
    {
        $this->repository = \App(ServicesRepository::class);
        $this->formDataProvider = \App(ServiceForm::class);
        $this->formProcessor = \App(ServiceFormProcessor::class);
    }
}
