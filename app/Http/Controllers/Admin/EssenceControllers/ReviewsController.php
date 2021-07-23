<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Admin\BaseEssenceController;
use App\Services\DataProviders\ReviewForm\ReviewForm;
use App\Services\FormProcessors\Review\ReviewFormProcessor;
use App\Services\Repositories\Review\ReviewRepository;

class ReviewsController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.reviews.index';
    protected const  ROUTE_CREATE = 'cc.reviews.create';
    protected const  ROUTE_STORE = 'cc.reviews.store';
    protected const  ROUTE_EDIT = 'cc.reviews.edit';
    protected const  ROUTE_UPDATE = 'cc.reviews.update';
    protected const  ROUTE_DESTROY = 'cc.reviews.destroy';
    protected const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.reviews.toggle-attribute';
    protected const  ROUTE_UPDATE_POSITIONS = 'cc.reviews.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.reviews.create';
    public const BREADCRUMBS_EDIT = 'cc.reviews.edit';

    protected const VIEW_LIST = 'admin.essence.reviews._list';
    protected const VIEW_FORM_FIELDS = 'admin.essence.reviews._form_fields';

    protected const INDEX_TITLE = 'Отзывы';

    protected const CREATE_MESSAGE = 'Отзыв создан';
    protected const EDIT_MESSAGE = 'Отзыв обновлён';
    protected const DESTROY_MESSAGE = 'Отзыв удалён';

    public const ESSENCE_NAME = 'review';

    protected function setDependencies(): void
    {
        $this->repository = \App(ReviewRepository::class);
        $this->formDataProvider = \App(ReviewForm::class);
        $this->formProcessor = \App(ReviewFormProcessor::class);
    }
}
