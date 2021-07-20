<?php

namespace App\Http\Controllers\Admin\Reviews;

use App\Http\Controllers\Controller;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;
use Illuminate\Http\JsonResponse;

class ImagesController extends Controller
{
    public function __construct(
        private ReviewImageRepository $repository
    ){}

    public function create(): JsonResponse
    {
        $imageKey = \Request::get('key');
        $image = $this->repository->newInstance();
        $element = view(
            'admin.review.form.images._image',
            [
                'imageKey' => $imageKey,
                'image' => $image,
            ]
        )->render();

        return \Response::json(['element' => $element]);
    }
}
