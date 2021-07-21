<?php

namespace App\Http\Controllers\Admin\PageControllers;

use App\Http\Controllers\Admin\BasePagesController;
use App\Models\TargetAudiencePage;

final class TargetAudiencePageController extends BasePagesController
{
    public const  ROUTE_EDIT = 'cc.target-audience-pages.edit';
    public const  ROUTE_UPDATE = 'cc.target-audience-pages.update';
    protected const VIEW_FOR_EDIT = 'admin.pages.target_audience_pages.edit';

    protected function installModelPage(): void
    {
        $this->modelPage = new TargetAudiencePage();
    }
}
