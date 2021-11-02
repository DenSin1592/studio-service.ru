<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Client\EssenceControllers\ServiceController;
use App\Services\DataProviders\ServiceForm\ServiceForm;
use App\Services\FormProcessors\Service\ServiceFormProcessor;
use App\Services\Repositories\Services\ServicesRepository;

final class ServicesController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.services.index';
    protected const  ROUTE_CREATE = 'cc.services.create';
    protected const  ROUTE_STORE = 'cc.services.store';
    public const  ROUTE_EDIT = 'cc.services.edit';
    protected const  ROUTE_UPDATE = 'cc.services.update';
    protected const  ROUTE_DESTROY = 'cc.services.destroy';
    protected const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.services.toggle-attribute';
    protected const  ROUTE_UPDATE_POSITIONS = 'cc.services.update-positions';
    protected const  ROUTE_COPY = 'cc.services.copy';

    public const BREADCRUMBS_CREATE = 'cc.services.create';
    public const BREADCRUMBS_EDIT = 'cc.services.edit';

    protected const VIEW_HEADER_FIELD_NAME = 'admin.essence.services._header_fields';
    protected const VIEW_LIST = 'admin.essence.services._list';
    protected const VIEW_FORM_FIELDS = 'admin.essence.services._form_fields';

    public const INDEX_TITLE = 'Каталог Услуг';

    protected const CREATE_MESSAGE = 'Услуга создана';
    protected const EDIT_MESSAGE = 'Услуга обновлена';
    protected const DESTROY_MESSAGE = 'Услуга удалена';

    public const ESSENCE_NAME = 'service';

    protected function setDependencies(): void
    {
        $this->repository = \App(ServicesRepository::class);
        $this->formDataProvider = \App(ServiceForm::class);
        $this->formProcessor = \App(ServiceFormProcessor::class);
        $this->urlShowONSite = ServiceController::ROUTE_SHOW_ON_SITE;
    }
}
