<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Features\ToggleFlags;
use App\Http\Controllers\Admin\Features\UpdatePositions;
use App\Http\Controllers\Controller;
use App\Services\Admin\Breadcrumbs\Breadcrumbs;
use App\Services\FormProcessors\Competence\CompetenceFormProcessor;
use App\Services\Repositories\Competencies\CompetenciesRepository;

class CompetenciesController extends Controller
{
    use ToggleFlags;
    use UpdatePositions;

    public const  ROUTE_INDEX = 'cc.competencies.index';
    public const  ROUTE_CREATE = 'cc.competencies.create';
    public const  ROUTE_STORE = 'cc.competencies.store';
    public const  ROUTE_EDIT = 'cc.competencies.edit';
    public const  ROUTE_UPDATE = 'cc.competencies.update';
    public const  ROUTE_DESTROY = 'cc.competencies.destroy';
    public const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.competencies.toggle-attribute';
    public const  ROUTE_UPDATE_POSITIONS = 'cc.competencies.update-positions';

    public function __construct(
        private CompetenciesRepository $repository,
        private CompetenceFormProcessor $formProcessor,
        private Breadcrumbs $breadcrumbs,
    ){}


    public function index()
    {
        $models = $this->repository->all();

        return view('admin.competencies.index')
            ->with('models', $models);
    }


    public function create()
    {
        $model = $this->repository->newInstance();
        $breadcrumbs = $this->breadcrumbs->getFor('competences.create', $model);

        return view('admin.competencies.create')
            ->with('model', $model)
            ->with('breadcrumbs', $breadcrumbs);
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
        return $redirect->with('alert_success', trans('Компетенция создана'));
    }


    public function edit($id)
    {
        $model = $this->repository->findById($id);
        $breadcrumbs = $this->breadcrumbs->getFor('competences.edit', $model);

        return view('admin.competencies.edit')
            ->with('model', $model)
            ->with('breadcrumbs', $breadcrumbs);
    }


    public function update($id)
    {
        $model = $this->repository->findById($id);
        $success = $this->formProcessor->update($model ,\Request::except('redirect_to'));
        if (!$success)
             return \Redirect::route(self::ROUTE_EDIT, [$model->id])
                 ->withErrors($this->formProcessor->errors())->withInput();

        if (\Request::get('redirect_to') === 'index') {
            $redirect = \Redirect::route(self::ROUTE_INDEX);
        } else {
            $redirect = \Redirect::route(self::ROUTE_EDIT, [$model->id]);
        }
        return $redirect->with('alert_success', trans('Компетенция обновлена'));
    }


    public function destroy($id)
    {
         $model = $this->repository->findById($id);
         $this->repository->delete($model);

         return \Redirect::route(self::ROUTE_INDEX)->with('alert_success', 'Компетенция удалена');
    }
}
