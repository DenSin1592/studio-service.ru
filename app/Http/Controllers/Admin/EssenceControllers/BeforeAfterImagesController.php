<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Services\DataProviders\BeforeAfterImageForm\BeforeAfterImageForm;
use App\Services\FormProcessors\BeforeAfterImage\BeforeAfterImageFormProcessor;
use App\Services\Repositories\BeforeAfterImages\BeforeAfterImagesRepository;

final class BeforeAfterImagesController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.before-after-images.index';
    protected const  ROUTE_CREATE = 'cc.before-after-images.create';
    protected const  ROUTE_STORE = 'cc.before-after-images.store';
    public const  ROUTE_EDIT = 'cc.before-after-images.edit';
    protected const  ROUTE_UPDATE = 'cc.before-after-images.update';
    protected const  ROUTE_DESTROY = 'cc.before-after-images.destroy';
    protected const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.before-after-images.toggle-attribute';
    protected const  ROUTE_UPDATE_POSITIONS = 'cc.before-after-images.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.before-after-images.create';
    public const BREADCRUMBS_EDIT = 'cc.before-after-images.edit';

    protected const VIEW_HEADER_FIELD_NAME = 'admin.essence.before_after_images._header_fields';
    protected const VIEW_LIST = 'admin.essence.before_after_images._list';
    protected const VIEW_FORM_FIELDS = 'admin.essence.before_after_images._form_fields';

    public const INDEX_TITLE = 'Изображение "До/После"';

    protected const CREATE_MESSAGE = 'Группа изображений создана';
    protected const EDIT_MESSAGE = 'Группа изображений обновлена';
    protected const DESTROY_MESSAGE = 'Группа изображений удалена';

    public const ESSENCE_NAME = 'beforeAfterImage';

    protected function setDependencies(): void
    {
        $this->repository = \App(BeforeAfterImagesRepository::class);
        $this->formDataProvider = \App(BeforeAfterImageForm::class);
        $this->formProcessor = \App(BeforeAfterImageFormProcessor::class);
    }
}
