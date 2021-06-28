<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Features\ToggleFlags;
use App\Http\Controllers\Controller;
use App\Services\Admin\Breadcrumbs\Breadcrumbs;
use App\Services\FormProcessors\Node\NodeFormProcessor;
use App\Services\Repositories\Node\EloquentNodeRepository;

class StructureController extends Controller
{
    use ToggleFlags;

    public const  ROUTE_INDEX = 'cc.structure.index';
    public const  ROUTE_CREATE = 'cc.structure.create';
    public const  ROUTE_STORE = 'cc.structure.store';
    public const  ROUTE_EDIT = 'cc.structure.edit';
    public const  ROUTE_UPDATE = 'cc.structure.update';
    public const  ROUTE_DESTROY = 'cc.structure.destroy';
    public const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.structure.toggle-attribute';
    public const  ROUTE_UPDATE_POSITIONS = 'cc.structure.update-positions';

    public function __construct(
        private EloquentNodeRepository $repository,
        private NodeFormProcessor $formProcessor,
        private Breadcrumbs $breadcrumbs,
    ){}


    public function index()
    {
        $nodeTree = $this->repository->getTree();
        return view('admin.structure.index')
            ->with('nodeTree', $nodeTree);
    }


    public function create()
    {
        $node = $this->repository->newInstance();
        $breadcrumbs = $this->breadcrumbs->getFor('structure_page.create', $node);

        return view('admin.structure.create')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('node', $node)
            ->with('parentVariants', $this->repository->getParentVariants(null, '[Корень]'));
    }


    public function store()
    {
        $node = $this->formProcessor->create(\Request::except('redirect_to'));
        if (is_null($node))
            return \Redirect::route(self::ROUTE_CREATE)->withErrors($this->formProcessor->errors())->withInput();

        if (\Request::get('redirect_to') === 'index') {
            $redirect = \Redirect::route(self::ROUTE_INDEX);
        } else {
            $redirect = \Redirect::route(self::ROUTE_EDIT, [$node->id]);
        }

        return $redirect->with('alert_success', trans('Страница создана'));
    }


    public function edit($id)
    {
        $node = $this->repository->findById($id);
        if (is_null($node))
            \App::abort(404, 'Node not found');

        $breadcrumbs = $this->breadcrumbs->getFor('structure_page.edit', $node);

        return view('admin.structure.edit')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('node', $node)
            ->with('parentVariants', $this->repository->getParentVariants($node, '[Корень]'));
    }


    public function update($id)
    {
        $node = $this->repository->findById($id);
        if (is_null($node))
            \App::abort(404, 'Node not found');

        $success = $this->formProcessor->update($node, \Request::except('redirect_to'));
        if (!$success)
            return \Redirect::route(self::ROUTE_EDIT, [$id])->withErrors($this->formProcessor->errors())->withInput();

        if (\Request::get('redirect_to') === 'index') {
            $redirect = \Redirect::route(self::ROUTE_INDEX);
        } else {
            $redirect = \Redirect::route(self::ROUTE_EDIT, [$id]);
        }

        return $redirect->with('alert_success', trans('Страница обновлена'));
    }


    public function destroy($id)
    {
        $node = $this->repository->findById($id);
        if (is_null($node))
            \App::abort(404, 'Node not found');

        $this->repository->delete($node);
        return \Redirect::route(self::ROUTE_INDEX)->with('alert_success', 'Страница удалена');
    }


    public function updatePositions()
    {
        $this->repository->updatePositions(\Request::get('positions', []));
        if (\Request::ajax())
            return \Response::json(['status' => 'alert_success']);
        return \Redirect::route(self::ROUTE_INDEX);
    }


    public function toggleAttribute($id, $attribute)
    {
        if (!in_array($attribute, ['publish', 'menu_top', 'menu_bottom']))
            \App::abort(404, "Not allowed to toggle this attribute");

        $node = $this->repository->findById($id);
        if (is_null($node))
            \App::abort(404, 'Node not found');

        $this->repository->toggleAttribute($node, $attribute);
        return $this->toggleFlagResponse(
            route(self::ROUTE_TOGGLE_ATTRIBUTE, [$id, $attribute]),
            $node,
            $attribute
        );
    }
}
