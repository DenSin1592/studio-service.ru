<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Http\Controllers\Client\PageControllers\PageController;
use App\Models\Node;

final class HomePageController extends PageController
{

    protected function getTypePage(): string
    {
        return Node::TYPE_HOME_PAGE;
    }


    protected function getView(): string
    {
        return 'client.home_page.show';
    }
}
