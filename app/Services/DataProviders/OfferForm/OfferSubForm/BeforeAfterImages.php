<?php

namespace App\Services\DataProviders\OfferForm\OfferSubForm;

use App\Http\Controllers\Admin\Relations\Offers\BeforeAfterImagesController;
use App\Services\DataProviders\BaseManyToManySubForm;
use App\Services\Repositories\BeforeAfterImages\BeforeAfterImagesRepository;

class BeforeAfterImages extends BaseManyToManySubForm
{
    protected const SUB_FORM_NAME = BeforeAfterImagesController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(BeforeAfterImagesRepository::class);
    }
}
