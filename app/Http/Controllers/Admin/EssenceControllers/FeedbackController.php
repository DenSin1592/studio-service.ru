<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Services\DataProviders\FeedbackForm\FeedbackForm;
use App\Services\FormProcessors\Feedback\FeedbackFormProcessor;
use App\Services\Repositories\Feedback\FeedbackRepository;

final class FeedbackController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.feedback.index';
    protected const  ROUTE_CREATE = 'cc.feedback.create';
    protected const  ROUTE_STORE = 'cc.feedback.store';
    protected const  ROUTE_EDIT = 'cc.feedback.edit';
    protected const  ROUTE_UPDATE = 'cc.feedback.update';
    protected const  ROUTE_DESTROY = 'cc.feedback.destroy';
    protected const  ROUTE_TOGGLE_ATTRIBUTE = null;
    protected const  ROUTE_UPDATE_POSITIONS = null;

    public const BREADCRUMBS_CREATE = 'cc.feedback.create';
    public const BREADCRUMBS_EDIT = 'cc.feedback.edit';

    protected const VIEW_HEADER_FIELD_NAME = 'admin.essence.feedback._header_fields';
    protected const VIEW_LIST = 'admin.essence.feedback._list';
    protected const VIEW_FORM_FIELDS = 'admin.essence.feedback._form_fields';

    public const INDEX_TITLE = 'Обратная связь';

    protected const CREATE_MESSAGE = 'Заявка создана';
    protected const EDIT_MESSAGE = 'Заявка обновлена';
    protected const DESTROY_MESSAGE = 'Заявка удалена';

    public const ESSENCE_NAME = 'offer';

    protected function setDependencies(): void
    {
        $this->repository = \App(FeedbackRepository::class);
        $this->formDataProvider = \App(FeedbackForm::class);
        $this->formProcessor = \App(FeedbackFormProcessor::class);
        $this->urlShowONSite = null;
    }


}
