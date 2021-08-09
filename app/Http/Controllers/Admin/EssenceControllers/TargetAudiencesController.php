<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Client\EssenceControllers\TargetAudienceController;
use App\Services\DataProviders\TargetAudienceForm\TargetAudienceForm;
use App\Services\FormProcessors\TargetAudience\TargetAudienceFormProcessor;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;


final class TargetAudiencesController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.target-audiences.index';
    protected const  ROUTE_CREATE = 'cc.target-audiences.create';
    protected const  ROUTE_STORE = 'cc.target-audiences.store';
    public const  ROUTE_EDIT = 'cc.target-audiences.edit';
    protected const  ROUTE_UPDATE = 'cc.target-audiences.update';
    protected const  ROUTE_DESTROY = 'cc.target-audiences.destroy';
    protected const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.target-audiences.toggle-attribute';
    protected const  ROUTE_UPDATE_POSITIONS = 'cc.target-audiences.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.target-audiences.create';
    public const BREADCRUMBS_EDIT = 'cc.target-audiences.edit';

    protected const VIEW_HEADER_FIELD_NAME = 'admin.essence.target_audiences._header_fields';
    protected const VIEW_LIST = 'admin.essence.target_audiences._list';
    protected const VIEW_FORM_FIELDS = 'admin.essence.target_audiences._form_fields';

    public const INDEX_TITLE = 'Каталог ЦА';

    protected const CREATE_MESSAGE = 'ЦА создана';
    protected const EDIT_MESSAGE = 'ЦА обновлена';
    protected const DESTROY_MESSAGE = 'ЦА удалена';

    public const ESSENCE_NAME = 'target_audience';

    protected function setDependencies(): void
    {
        $this->repository = \App(TargetAudienceRepository::class);
        $this->formDataProvider = \App(TargetAudienceForm::class);
        $this->formProcessor = \App(TargetAudienceFormProcessor::class);
        $this->urlShowONSite = TargetAudienceController::ROUTE_SHOW_ON_SITE;
    }

    public function index()
    {
        $modelList = $this->repository->getTree();
        return view(self::VIEW_INDEX)
            ->with('modelList', $modelList)
            ->with('viewHeaderFieldName', self::VIEW_HEADER_FIELD_NAME)
            ->with('title', self::INDEX_TITLE)
            ->with('viewListName', self::VIEW_LIST)
            ->with($this->getRoutePaths())
            ;
    }
}
