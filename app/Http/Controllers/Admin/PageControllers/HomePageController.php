<?php

namespace App\Http\Controllers\Admin\PageControllers;

use App\Http\Controllers\Admin\BasePagesController;
use App\Models\HomePage;

final class HomePageController extends BasePagesController
{
    public const  ROUTE_EDIT = 'cc.home-pages.edit';
    public const  ROUTE_UPDATE = 'cc.home-pages.update';
    protected const VIEW_FOR_EDIT = 'admin.pages.home_pages.edit';

    protected function installModelPage(): void
    {
        $this->modelPage = new HomePage();
    }

}
