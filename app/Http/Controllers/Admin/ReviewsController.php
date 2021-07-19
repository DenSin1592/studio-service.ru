<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Features\ToggleFlags;
use App\Http\Controllers\Controller;
use App\Services\Admin\Breadcrumbs\Breadcrumbs;
use App\Services\DataProviders\ReviewForm\ReviewForm;
use App\Services\FormProcessors\Review\ReviewFormProcessor;
use App\Services\Repositories\Review\ReviewRepository;

class ReviewsController extends Controller
{
    use ToggleFlags;

    public const  ROUTE_INDEX = 'cc.reviews.index';
    public const  ROUTE_CREATE = 'cc.reviews.create';
    public const  ROUTE_STORE = 'cc.reviews.store';
    public const  ROUTE_EDIT = 'cc.reviews.edit';
    public const  ROUTE_UPDATE = 'cc.reviews.update';
    public const  ROUTE_DESTROY = 'cc.reviews.destroy';
    public const  ROUTE_TOGGLE_ATTRIBUTE = 'cc.reviews.toggle-attribute';

    public function __construct(
        private ReviewRepository $repository,
        private ReviewFormProcessor $formProcessor,
        private ReviewForm $formDataProvider,
        private Breadcrumbs $breadcrumbs,
    ){}

    public function index()
    {
        $modelList = $this->repository->paginate();
        return view('admin.review.index')->with('modelList', $modelList);
    }

    public function create()
    {
        $model = $this->repository->newInstance();
        $formData = $this->formDataProvider->provideData($model, \Request::old());
        $breadcrumbs = $this->breadcrumbs->getFor('reviews.create', $model);

        return view('admin.review.create')
            ->with('formData', $formData)
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
        return $redirect->with('alert_success', trans('Отзыв создан'));
    }

    public function edit($id)
    {
        $model = $this->repository->findById($id);
        if (null === $model)
            \App::abort(404, 'Service is not found');

        $formData = $this->formDataProvider->provideData($model, old());
        $breadcrumbs = $this->breadcrumbs->getFor('reviews.edit', $model);

        return view('admin.review.edit')
            ->with('formData', $formData)
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
        return $redirect->with('alert_success', trans('Запись обновлена'));
    }

    public function destroy($id)
    {
        $review = $this->repository->findById($id);
        if (is_null($review)) {
            \App::abort(404, 'Review not found');
        }
        $this->repository->delete($review);

        return \Redirect::route(self::ROUTE_INDEX)->with('alert_success', 'Отзыв удален');
    }
}
