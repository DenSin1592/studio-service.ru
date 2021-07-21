<?php

namespace App\Http\Controllers\Admin\EssenceControllers;

use App\Http\Controllers\Admin\BaseEssenceController;
use App\Services\DataProviders\NodeForm\NodeForm;
use App\Services\FormProcessors\Node\NodeFormProcessor;
use App\Services\Repositories\Node\NodeRepository;

class StructureController extends BaseEssenceController
{
    public const  ROUTE_INDEX = 'cc.structure.index';
    public const  ROUTE_CREATE = 'cc.structure.create';
    public const  ROUTE_STORE = 'cc.structure.store';
    public const  ROUTE_EDIT = 'cc.structure.edit';
    public const  ROUTE_UPDATE = 'cc.structure.update';
    public const  ROUTE_DESTROY = 'cc.structure.destroy';
    public const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.structure.toggle-attribute';
    public const  ROUTE_UPDATE_POSITIONS = 'cc.structure.update-positions';

    public const BREADCRUMBS_CREATE = 'cc.structure.create';
    public const BREADCRUMBS_EDIT = 'cc.structure.edit';

    protected const VIEW_INDEX = 'admin.structure.index';
    protected const VIEW_CREATE = 'admin.structure.create';
    protected const VIEW_EDIT = 'admin.structure.edit';

    protected const CREATE_MESSAGE = 'Страница создана';
    protected const EDIT_MESSAGE = 'Страница обновлена';
    protected const DESTROY_MESSAGE = 'Страница удалена';


    protected function setDependencies(): void
    {
        $this->repository = \App(NodeRepository::class);
        $this->formDataProvider = \App(NodeForm::class);
        $this->formProcessor = \App(NodeFormProcessor::class);
    }

    public function index()
    {
        $nodeTree = $this->repository->getTree();
        return view(self::VIEW_INDEX)
            ->with('nodeTree', $nodeTree);
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
