<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Features\ToggleFlags;
use App\Http\Controllers\Controller;
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

    //private EloquentProductRepository $catalogProductRepository;
    //private AdminReviewFormProcessor $formProcessor;
    //private ReviewForm $reviewDataProvider;

    public function __construct(
        private ReviewRepository $repository,
        //EloquentProductRepository $catalogProductRepository,
        //AdminReviewFormProcessor $formProcessor,
        //ReviewForm $reviewDataProvider
    ){}

    public function index()
    {
        $reviewList = $this->repository->paginate();
        return view('admin.review.index')->with('reviewList', $reviewList);
    }

    /*public function create()
    {
        $review = $this->repository->newInstance();
        $formData = $this->reviewDataProvider->provideDataFor($review, \Request::old());
        $reviewList = $this->repository->paginate();

        $productVariants = [];

        return view('admin.review.create')
            ->with('reviewList', $reviewList)
            ->with('formData', $formData)
            ->with('productVariants', $productVariants);
    }*/

   /* public function store()
    {
        $review = $this->formProcessor->create(\Request::except('redirect_to'));
        if (null === $review) {
            return \Redirect::route('cc.reviews.create')
                ->withErrors($this->formProcessor->errors())->withInput();
        } else {
            if (\Request::get('redirect_to') === 'index') {
                $redirect = \Redirect::route('cc.reviews.index', $review->id);
            } else {
                $redirect = \Redirect::route('cc.reviews.edit', $review->id);
            }

            return $redirect->with('alert_success', 'Отзыв создан');
        }
    }*/

   /* public function edit($id)
    {
        $review = $this->repository->findById($id);
        if (is_null($review)) {
            App::abort(404, 'Review not found');
        }
        $formData = $this->reviewDataProvider->provideDataFor($review, \Request::old());
        $reviewList = $this->repository->paginate();

        $product = $review->product()->first();
        $productVariants = [
            $product->id => "$product->name [id = $product->id]"
        ];


        return view('admin.review.edit')
            ->with('reviewList', $reviewList)
            ->with('product', $product)
            ->with('formData', $formData)
            ->with('productVariants', $productVariants);
    }*/

    /*public function update($id)
    {
        $review = $this->repository->findById($id);
        if (is_null($review)) {
            \App::abort(404, 'Review not found');
        }

        $success = $this->formProcessor->update($review, \Request::except('redirect_to'));
        if (!$success) {
            return \Redirect::route('cc.reviews.edit', $review->id)
                ->withErrors($this->formProcessor->errors())->withInput();
        } else {
            if (\Request::get('redirect_to') === 'index') {
                $redirect = \Redirect::route('cc.reviews.index', $review->id);
            } else {
                $redirect = \Redirect::route('cc.reviews.edit', $review->id);
            }

            return $redirect->with('alert_success', 'Отзыв обновлен');
        }
    }*/

   /* public function destroy($id)
    {
        $review = $this->repository->findById($id);
        if (is_null($review)) {
            \App::abort(404, 'Review not found');
        }
        $this->repository->delete($review);

        return \Redirect::route('cc.reviews.index')->with('alert_success', 'Отзыв удален');
    }*/
}
