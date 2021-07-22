<?php

namespace App\Http\Controllers\Admin\Relations\OurWorks;

use App\Http\Controllers\Controller;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;
use Illuminate\Http\JsonResponse;

class ImagesController extends Controller
{
    public const RELATIONS_NAME = 'images';
    public const ROUTE_CREATE = 'cc.our-works.our-works-images.create';

    public function __construct(
        private ReviewImageRepository $repository
    ){}

    public function create(): JsonResponse
    {
        $imageKey = \Request::get('key');
        $image = $this->repository->newInstance();
        $element = view(
            'admin.shared._images._image',
            [
                'imageKey' => $imageKey,
                'image' => $image,
            ]
        )->render();

        return \Response::json(['element' => $element]);
    }
}
