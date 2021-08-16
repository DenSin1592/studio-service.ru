<?php

namespace App\Services\DataProviders\ServiceForm\ServiceSubForm;

use App\Http\Controllers\Admin\Relations\Services\TabsController;
use App\Services\DataProviders\BaseOneToManySubForm;
use App\Services\Repositories\Services\ServiceTab\ServiceTabRepository;

final class Tabs extends BaseOneToManySubForm
{
    protected const SUB_FORM_NAME = TabsController::RELATIONS_NAME;

    protected function setRepository(): void
    {
        $this->repository = \App(ServiceTabRepository::class);
    }
}
