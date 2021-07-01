<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Admin\Features\ToggleFlags;
use App\Http\Controllers\Admin\Features\UpdatePositions;
use App\Services\Admin\Breadcrumbs\Breadcrumbs;
use App\Services\FormProcessors\Service\ServiceFormProcessor;
use App\Services\Repositories\Services\ServicesRepository;

class ServicesController
{
    use ToggleFlags;
    use UpdatePositions;

    public const  ROUTE_INDEX = 'cc.services.index';
    public const  ROUTE_CREATE = 'cc.services.create';
    public const  ROUTE_STORE = 'cc.services.store';
    public const  ROUTE_EDIT = 'cc.services.edit';
    public const  ROUTE_UPDATE = 'cc.services.update';
    public const  ROUTE_DESTROY = 'cc.services.destroy';
    public const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.services.toggle-attribute';
    public const  ROUTE_UPDATE_POSITIONS = 'cc.services.update-positions';

    public function __construct(
        private ServicesRepository $repository,
        private ServiceFormProcessor $formProcessor,
        private Breadcrumbs $breadcrumbs,
    ){}


    public function index()
    {

        $models = $this->repository->all();

        return view('admin.services.index')
            ->with('models', $models);
    }


    public function create()
    {
        $model = $this->repository->newInstance();
        $breadcrumbs = $this->breadcrumbs->getFor('competences.create', $model);

        return view('admin.services.create')
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
        return $redirect->with('alert_success', trans('Услуга создана'));
    }


    public function edit($id)
    {
        $model = $this->repository->find($id);
        $breadcrumbs = $this->breadcrumbs->getFor('competences.edit', $model);

        return view('admin.services.edit')
            ->with('model', $model)
            ->with('breadcrumbs', $breadcrumbs);
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
        return $redirect->with('alert_success', trans('Услуга обновлена'));
    }


    public function destroy($id)
    {
        $model = $this->repository->find($id);
        $this->repository->delete($model);

        return \Redirect::route(self::ROUTE_INDEX)->with('alert_success', 'Услуга удалена');
    }
}
