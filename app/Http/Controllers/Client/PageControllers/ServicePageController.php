<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Http\Controllers\Client\BasePagesController;
use App\Http\Controllers\Client\EssenceControllers\ServiceController;
use App\Models\Node;

final class ServicePageController extends BasePagesController
{
    protected const TYPE_PAGE = Node::TYPE_SERVICE_PAGE;
    protected const VIEW_FOR_SHOW = 'client.service_page.show';

    public function show()
    {
        return parent::show()
            ->with('modelList', resolve(ServiceController::class)->getModelsForServicePage())
            ;
    }
}
