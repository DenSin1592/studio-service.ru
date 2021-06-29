<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Features\ToggleFlags;
use App\Http\Controllers\Admin\Features\UpdatePositions;
use App\Http\Controllers\Controller;
use App\Services\Admin\Breadcrumbs\Breadcrumbs;
use App\Services\FormProcessors\TargetAudience\TargetAudienceFormProcessor;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;


class TargetAudiencesController extends Controller
{
    use ToggleFlags;
    use UpdatePositions;

    public const  ROUTE_INDEX = 'cc.target-audiences.index';
    public const  ROUTE_CREATE = 'cc.target-audiences.create';
    public const  ROUTE_STORE = 'cc.target-audiences.store';
    public const  ROUTE_EDIT = 'cc.target-audiences.edit';
    public const  ROUTE_UPDATE = 'cc.target-audiences.update';
    public const  ROUTE_DESTROY = 'cc.target-audiences.destroy';
    public const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.target-audiences.toggle-attribute';
    public const  ROUTE_UPDATE_POSITIONS = 'cc.target-audiences.update-positions';

    public function __construct(
        private TargetAudienceRepository $repository,
        private TargetAudienceFormProcessor $formProcessor,
        private Breadcrumbs $breadcrumbs,
    ){}


    public function index()
    {
        $modelTree = $this->repository->getTree();
        if (!\Request::ajax())
            return view('admin.target_audience.index')
                ->with('modelTree', $modelTree);

    }


    public function create()
    {
        $model = $this->repository->newInstance();
        $breadcrumbs = $this->breadcrumbs->getFor('target_audiences.create', $model);

        return view('admin.target_audience.create')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('model', $model)
            ->with('parentVariants', $this->repository->getParentVariants(null, '[Корень]'));
    }


    public function store()
    {
        $model = $this->formProcessor->create(\Request::except('redirect_to'));
        if (is_null($model))
            return \Redirect::route(self::ROUTE_CREATE)
                ->withErrors($this->formProcessor->errors())->withInput();

        if (\Request::get('redirect_to') === 'index') {
            $redirect = \Redirect::route(self::ROUTE_INDEX);
        } else {
            $redirect = \Redirect::route(self::ROUTE_EDIT, [$model->id]);
        }
        return $redirect->with('alert_success', trans('ЦА создана'));
    }


    public function edit($id)
    {
        $model = $this->repository->find($id);
        $breadcrumbs = $this->breadcrumbs->getFor('target_audiences.edit', $model);

        return view('admin.target_audience.edit')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('model', $model)
            ->with('parentVariants', $this->repository->getParentVariants(null, '[Корень]'));
    }


    public function update($id)
    {
        $model = $this->repository->find($id);
        $success = $this->formProcessor->update($model ,\Request::except('redirect_to'));
        if (!$success)
             return \Redirect::route(self::ROUTE_EDIT, [$model->id])
                 ->withErrors($this->formProcessor->errors())->withInput();

        if (\Request::get('redirect_to') === 'index') {
            $redirect = \Redirect::route(self::ROUTE_INDEX);
        } else {
            $redirect = \Redirect::route(self::ROUTE_EDIT, [$model->id]);
        }
        return $redirect->with('alert_success', trans('ЦА обновлена'));
    }


    public function destroy($id)
    {
        $model = $this->repository->find($id);
        if (is_null($model))
            \App::abort(404, 'Node not found');

        $this->repository->delete($model);

        return \Redirect::route(self::ROUTE_INDEX)->with('alert_success', 'ЦА удалена');
    }
}
