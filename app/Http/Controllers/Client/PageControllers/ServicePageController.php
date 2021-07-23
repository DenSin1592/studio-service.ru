<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Models\Node;

final class ServicePageController extends BasePagesController
{
    protected const TYPE_PAGE = Node::TYPE_SERVICE_PAGE;
    protected const VIEW_FOR_SHOW = 'client.service_page.show';
}
