<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Admin\BaseEssenceController;
use App\Services\DataProviders\NodeForm\NodeForm;
use App\Services\FormProcessors\Node\NodeFormProcessor;
use App\Services\Repositories\Node\NodeRepository;

class StructureController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.structure.index';
    protected const  ROUTE_CREATE = 'cc.structure.create';
    protected const  ROUTE_STORE = 'cc.structure.store';
    public const  ROUTE_EDIT = 'cc.structure.edit';
    protected const  ROUTE_UPDATE = 'cc.structure.update';
    public const  ROUTE_DESTROY = 'cc.structure.destroy';
    protected const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.structure.toggle-attribute';
    protected const  ROUTE_UPDATE_POSITIONS = 'cc.structure.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.structure.create';
    public const BREADCRUMBS_EDIT = 'cc.structure.edit';

    protected const VIEW_HEADER_FIELD_NAME = 'admin.essence.structure._header_fields';
    protected const VIEW_LIST = 'admin.essence.structure._list';
    protected const VIEW_FORM_FIELDS = 'admin.essence.structure._form_fields';

    protected const INDEX_TITLE = 'Структура сайта';

    protected const CREATE_MESSAGE = 'Страница создана';
    protected const EDIT_MESSAGE = 'Страница обновлена';
    protected const DESTROY_MESSAGE = 'Страница удалена';

    public const ESSENCE_NAME = 'structure';

    protected function setDependencies(): void
    {
        $this->repository = \App(NodeRepository::class);
        $this->formDataProvider = \App(NodeForm::class);
        $this->formProcessor = \App(NodeFormProcessor::class);
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
