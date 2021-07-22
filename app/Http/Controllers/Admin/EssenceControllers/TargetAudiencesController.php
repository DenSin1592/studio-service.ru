<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Admin\BaseEssenceController;
use App\Services\DataProviders\TargetAudienceForm\TargetAudienceForm;
use App\Services\FormProcessors\TargetAudience\TargetAudienceFormProcessor;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;


class TargetAudiencesController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.target-audiences.index';
    public const  ROUTE_CREATE = 'cc.target-audiences.create';
    public const  ROUTE_STORE = 'cc.target-audiences.store';
    public const  ROUTE_EDIT = 'cc.target-audiences.edit';
    public const  ROUTE_UPDATE = 'cc.target-audiences.update';
    public const  ROUTE_DESTROY = 'cc.target-audiences.destroy';
    public const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.target-audiences.toggle-attribute';
    public const  ROUTE_UPDATE_POSITIONS = 'cc.target-audiences.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.target-audiences.create';
    public const BREADCRUMBS_EDIT = 'cc.target-audiences.edit';

    protected const VIEW_INDEX = 'admin.target_audiences.index';
    protected const VIEW_CREATE = 'admin.target_audiences.create';
    protected const VIEW_EDIT = 'admin.target_audiences.edit';

    protected const CREATE_MESSAGE = 'ЦА создана';
    protected const EDIT_MESSAGE = 'ЦА обновлена';
    protected const DESTROY_MESSAGE = 'ЦА удалена';

    protected function setDependencies(): void
    {
        $this->repository = \App(TargetAudienceRepository::class);
        $this->formDataProvider = \App(TargetAudienceForm::class);
        $this->formProcessor = \App(TargetAudienceFormProcessor::class);
    }

    public function index()
    {
        $modelList = $this->repository->getTree();
        return view(self::VIEW_INDEX)
            ->with('modelList', $modelList);
    }

    public function create()
    {
        return parent::create()
            ->with('parentVariants', $this->repository->getParentVariants(null, '[Корень]'));
    }


    public function edit($id)
    {
        return parent::edit($id)
            ->with('parentVariants', $this->repository->getParentVariants(null, '[Корень]'));
    }
}
