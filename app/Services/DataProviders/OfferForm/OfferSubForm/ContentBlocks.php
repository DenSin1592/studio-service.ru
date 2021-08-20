<?php

namespace App\Services\DataProviders\OfferForm\OfferSubForm;

use App\Http\Controllers\Admin\Relations\Offers\ContentBlocksController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\Offer\OfferContentBlock\OfferContentBlockRepository;

final class ContentBlocks extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = ContentBlocksController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(OfferContentBlockRepository::class);
    }
}
