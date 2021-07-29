<?php

namespace App\Services\FormProcessors\Review\SubProcessor;

use App\Http\Controllers\Admin\Relations\Reviews\ImagesController;
use App\Models\ReviewImage;
use App\Services\FormProcessors\BaseOneToManySubProcessor;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;

final class Images extends BaseOneToManySubProcessor
{
    protected const SUB_FORM_NAME = ImagesController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(ReviewImageRepository::class);
    }

    protected function SelectNotEmptyData(array &$imagesListData) :void
    {
        $imagesListData = array_filter(
            $imagesListData,
            static fn($val) => (isset($val[ReviewImage::IMAGE_FILE]) || !empty($val['id']))
        );
    }
}
