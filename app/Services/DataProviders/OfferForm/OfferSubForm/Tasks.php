<?php

namespace App\Services\DataProviders\OfferForm\OfferSubForm;

use App\Http\Controllers\Admin\Relations\Offers\TasksController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\Offer\OfferTask\OfferTaskRepository;

final class Tasks extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = TasksController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(OfferTaskRepository::class);
    }
}
