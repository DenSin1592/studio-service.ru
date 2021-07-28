<?php

namespace App\Services\DataProviders\ReviewForm\ReviewSubForm;

use App\Http\Controllers\Admin\Relations\Reviews\ImagesController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;

final class Images extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = ImagesController::RELATIONS_NAME;

    protected function setRepository()
    {
        $this->repository = \App(ReviewImageRepository::class);
    }
}
