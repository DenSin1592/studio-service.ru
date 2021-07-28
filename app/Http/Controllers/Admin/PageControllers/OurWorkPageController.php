<?php

namespace App\Http\Controllers\Admin\PageControllers;

use App\Models\OurWorkPage;

final class OurWorkPageController extends BasePagesController
{
    public const  ROUTE_EDIT = 'cc.our-work-pages.edit';
    public const  ROUTE_UPDATE = 'cc.our-work-pages.update';
    protected const VIEW_FOR_EDIT = 'admin.pages.edit';

    protected function installModelPage(): void
    {
        $this->modelPage = new OurWorkPage();
    }
}
