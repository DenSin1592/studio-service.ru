<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Features\ToggleFlags;
use App\Http\Controllers\Controller;
use App\Services\Admin\Breadcrumbs\Breadcrumbs;
use App\Services\FormProcessors\TargetAudience\TargetAudienceFormProcessor;
use App\Services\Repositories\TargetAudience\EloquentTargetAudienceRepository;


class TargetAudiencesController extends Controller
{
    use ToggleFlags;

    public function __construct(
        private EloquentTargetAudienceRepository $repository,
        private TargetAudienceFormProcessor $formProcessor,
        private Breadcrumbs $breadcrumbs,
    ){}

    public function index()
    {
        $modelTree = $this->repository->getTree();
        if (!\Request::ajax())
            return view('admin.target_audience.index')
                ->with('modelTree', $modelTree);

        //todo:разобраться, похоже что не надо
        /*$content = view('admin.target_audience._list')
            ->with('modelTree', $modelTree)
            ->with('lvl', 0)
            ->render();

        return \Response::json(['element_list' => $content]);*/
    }


    public function create()
    {
        $model = $this->repository->newInstance();
        $breadcrumbs = $this->breadcrumbs->getFor('target_audience.create', $model);

        return view('admin.target_audience.create')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('model', $model)
            ->with('parentVariants', $this->repository->getParentVariants(null, '[Корень]'));
    }


    public function store()
    {
        $model = $this->formProcessor->create(\Request::except('redirect_to'));
        if (is_null($model))
            return \Redirect::route('cc.target-audiences.create')
                ->withErrors($this->formProcessor->errors())->withInput();

        if (\Request::get('redirect_to') == 'index') {
            $redirect = \Redirect::route('cc.target-audiences.index');
        } else {
            $redirect = \Redirect::route('cc.target-audiences.index', [$model->id]);
        }
        return $redirect->with('alert_success', trans('Страница создана'));
    }


    public function edit($id)
    {
        dd(__METHOD__);
    }


    public function update($id)
    {
        dd(__METHOD__);
    }


    public function destroy($id)
    {
        dd(__METHOD__);
    }

    public function updatePositions()
    {
        $this->repository->updatePositions(\Request::get('positions', []));
        if (\Request::ajax())
            return \Response::json(['status' => 'alert_success']);

        return \Redirect::route('cc.target-audiences.index');

    }

    public function toggleAttribute($id, $attribute)
    {
        if (!in_array($attribute, ['publish'])) {
            \App::abort(404, "Not allowed to toggle this attribute");
        }
        $node = $this->repository->findById($id);
        if (is_null($node)) {
            \App::abort(404, 'Node not found');
        }
        $this->repository->toggleAttribute($node, $attribute);

        return $this->toggleFlagResponse(
            route('cc.target-audiences.toggle-attribute', [$id, $attribute]),
            $node,
            $attribute
        );
    }
}
