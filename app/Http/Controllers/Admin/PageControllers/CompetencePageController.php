<?php

namespace App\Http\Controllers\Admin\PageControllers;

use App\Http\Controllers\Admin\BasePagesController;
use App\Models\CompetencePage;

final class CompetencePageController extends BasePagesController
{
    public const  ROUTE_EDIT = 'cc.competence-pages.edit';
    public const  ROUTE_UPDATE = 'cc.competence-pages.update';
    protected const VIEW_FOR_EDIT = 'admin.pages.edit';

    protected function installModelPage(): void
    {
        $this->modelPage = new CompetencePage();
    }

}
