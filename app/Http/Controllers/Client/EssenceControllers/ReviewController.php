<?php

namespace App\Http\Controllers\Client\EssenceControllers;

use App\Http\Controllers\Controller;
use App\Services\Repositories\Review\ReviewRepository;

class ReviewController extends Controller
{
    private ReviewRepository $repository;

    public function __construct()
    {
        $this->setRepository();
    }

    private function setRepository(): void
    {
        $this->repository = \App(ReviewRepository::class);
    }
}
