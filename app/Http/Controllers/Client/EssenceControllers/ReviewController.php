<?php

namespace App\Http\Controllers\Client\EssenceControllers;

use App\Http\Controllers\Client\BaseEssenceController;
use App\Services\Repositories\Review\ReviewRepository;

class ReviewController extends BaseEssenceController
{

    protected function setRepository(): void
    {
        $this->repository = \App(ReviewRepository::class);
    }

}
