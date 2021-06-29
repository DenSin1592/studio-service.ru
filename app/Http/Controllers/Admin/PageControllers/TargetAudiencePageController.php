<?php

namespace App\Http\Controllers\Admin\PageControllers;

use App\Models\TargetAudiencePage;

class TargetAudiencePageController extends BasePageController
{
    public const  ROUTE_EDIT = 'cc.target-audience-pages.edit';
    public const  ROUTE_UPDATE = 'cc.target-audience-pages.update';
    protected const VIEW_FOR_EDIT = 'admin.pages.target_audience_pages.edit';

    protected function installModelPage(): void
    {
        $this->modelPage = new TargetAudiencePage();
    }
}