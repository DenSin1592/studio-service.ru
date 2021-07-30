<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Client\EssenceControllers\CompetenceController;
use App\Services\DataProviders\OfferForm\OfferForm;
use App\Services\FormProcessors\Offer\OfferFormProcessor;
use App\Services\Repositories\Offer\OfferRepository;

final class OffersController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.offers.index';
    protected const  ROUTE_CREATE = 'cc.offers.create';
    protected const  ROUTE_STORE = 'cc.offers.store';
    public const  ROUTE_EDIT = 'cc.offers.edit';
    protected const  ROUTE_UPDATE = 'cc.offers.update';
    protected const  ROUTE_DESTROY = 'cc.offers.destroy';
    protected const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.offers.toggle-attribute';
    protected const  ROUTE_UPDATE_POSITIONS = 'cc.offers.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.offers.create';
    public const BREADCRUMBS_EDIT = 'cc.offers.edit';

    protected const VIEW_HEADER_FIELD_NAME = 'admin.essence.offers._header_fields';
    protected const VIEW_LIST = 'admin.essence.offers._list';
    protected const VIEW_FORM_FIELDS = 'admin.essence.offers._form_fields';

    public const INDEX_TITLE = 'Каталог Офферов';

    protected const CREATE_MESSAGE = 'Оффер создан';
    protected const EDIT_MESSAGE = 'Оффер обновлён';
    protected const DESTROY_MESSAGE = 'Оффер удалён';

    public const ESSENCE_NAME = 'offer';

    protected function setDependencies(): void
    {
        $this->repository = \App(OfferRepository::class);
        $this->formDataProvider = \App(OfferForm::class);
        $this->formProcessor = \App(OfferFormProcessor::class);
        $this->urlShowONSite = CompetenceController::ROUTE_SHOW_ON_SITE;
    }


}
