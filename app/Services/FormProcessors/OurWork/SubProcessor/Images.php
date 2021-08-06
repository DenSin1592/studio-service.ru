<?php

namespace App\Services\FormProcessors\OurWork\SubProcessor;

use App\Http\Controllers\Admin\Relations\OurWorks\ImagesController;
use App\Models\OurWorkImage;
use App\Services\FormProcessors\BaseOneToManySubProcessor;
use App\Services\Repositories\OurWork\OurWorkImage\OurWorkImageRepository;

final class Images extends BaseOneToManySubProcessor
{
    protected const SUB_FORM_NAME = ImagesController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(OurWorkImageRepository::class);
    }

    protected function SelectNotEmptyData(array &$listData) :void
    {
        $listData = array_filter(
            $listData,
            static fn($val) => (isset($val[OurWorkImage::IMAGE_FILE]) || !empty($val['id']))
        );
    }
}
