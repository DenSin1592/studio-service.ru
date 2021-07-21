<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Admin\BaseEssenceController;
use App\Services\DataProviders\ReviewForm\ReviewForm;
use App\Services\FormProcessors\Review\ReviewFormProcessor;
use App\Services\Repositories\Review\ReviewRepository;

class ReviewsController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.reviews.index';
    public const  ROUTE_CREATE = 'cc.reviews.create';
    public const  ROUTE_STORE = 'cc.reviews.store';
    public const  ROUTE_EDIT = 'cc.reviews.edit';
    public const  ROUTE_UPDATE = 'cc.reviews.update';
    public const  ROUTE_DESTROY = 'cc.reviews.destroy';
    public const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.reviews.toggle-attribute';
    public const  ROUTE_UPDATE_POSITIONS = 'cc.reviews.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.reviews.create';
    public const BREADCRUMBS_EDIT = 'cc.reviews.edit';

    protected const VIEW_INDEX = 'admin.reviews.index';
    protected const VIEW_CREATE = 'admin.reviews.create';
    protected const VIEW_EDIT = 'admin.reviews.edit';

    protected const CREATE_MESSAGE = 'Отзыв создан';
    protected const EDIT_MESSAGE = 'Отзыв обновлён';
    protected const DESTROY_MESSAGE = 'Отзыв удалён';

    protected function setDependencies(): void
    {
        $this->repository = \App(ReviewRepository::class);
        $this->formDataProvider = \App(ReviewForm::class);
        $this->formProcessor = \App(ReviewFormProcessor::class);
    }
}
