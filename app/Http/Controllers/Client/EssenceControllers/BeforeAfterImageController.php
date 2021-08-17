<?php

namespace App\Http\Controllers\Client\EssenceControllers;

use App\Http\Controllers\Client\BaseEssenceController;
use App\Services\Repositories\BeforeAfterImages\BeforeAfterImagesRepository;

class BeforeAfterImageController extends BaseEssenceController
{

    protected function setRepository(): void
    {
        $this->repository = \App(BeforeAfterImagesRepository::class);
    }


}
