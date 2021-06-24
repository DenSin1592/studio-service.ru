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

    public function __construct(
        private EloquentNodeRepository $repository,
        private NodeFormProcessor $formProcessor,
        private Breadcrumbs $breadcrumbs,
    ){}


    public function index()
    {
        $nodeTree = $this->repository->getTree();
        if (!\Request::ajax())
            return view('admin.structure.index')
                ->with('nodeTree', $nodeTree);

        //todo:разобраться, похоже что не надо
       /* $content = view('admin.structure._node_list')
            ->with('nodeTree', $nodeTree)
            ->with('lvl', 0)
            ->render();

        return \Response::json(['element_list' => $content]);*/
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
            return \Redirect::route('cc.structure.create')->withErrors($this->formProcessor->errors())->withInput();

        if (\Request::get('redirect_to') == 'index') {
            $redirect = \Redirect::route('cc.structure.index');
        } else {
            $redirect = \Redirect::route('cc.structure.edit', [$node->id]);
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
            ->with('parentVariants', $this->repository->getParentVariants($node, '[Корень]'))
            ->with('nodeTree', $this->repository->getCollapsedTree($node));
    }


    public function update($id)
    {
        $node = $this->repository->findById($id);
        if (is_null($node))
            \App::abort(404, 'Node not found');

        $success = $this->formProcessor->update($node, \Request::except('redirect_to'));
        if (!$success)
            return \Redirect::route('cc.structure.edit', [$id])->withErrors($this->formProcessor->errors())->withInput();

        if (\Request::get('redirect_to') == 'index') {
            $redirect = \Redirect::route('cc.structure.index');
        } else {
            $redirect = \Redirect::route('cc.structure.edit', [$id]);
        }

        return $redirect->with('alert_success', trans('Страница обновлена'));
    }


    public function destroy($id)
    {
        $node = $this->repository->findById($id);
        if (is_null($node))
            \App::abort(404, 'Node not found');

        $this->repository->delete($node);
        return \Redirect::route('cc.structure.index')->with('alert_success', 'Страница удалена');
    }


    public function updatePositions()
    {
        $this->repository->updatePositions(\Request::get('positions', []));
        if (\Request::ajax())
            return \Response::json(['status' => 'alert_success']);
        return \Redirect::route('cc.structure.index');
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
            route('cc.structure.toggle-attribute', [$id, $attribute]),
            $node,
            $attribute
        );
    }
}
