<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Http\Controllers\Client\BasePagesController;
use App\Models\Node;

final class HomePageController extends BasePagesController
{
    protected const TYPE_PAGE = Node::TYPE_HOME_PAGE;
    protected const VIEW_FOR_SHOW = 'client.home_page.show';
}
