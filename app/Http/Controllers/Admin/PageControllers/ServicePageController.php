<?php

namespace App\Http\Controllers\Admin\PageControllers;

use App\Models\ServicePage;

final class ServicePageController extends BasePagesController
{
    public const  ROUTE_EDIT = 'cc.service-pages.edit';
    public const  ROUTE_UPDATE = 'cc.service-pages.update';
    protected const VIEW_FOR_EDIT = 'admin.pages.service_page.edit';

    protected function installModelPage(): void
    {
        $this->modelPage = new ServicePage();
    }

}
