<?php

namespace App\Http\Controllers\Admin\PageControllers;

use App\Models\TextPage;

final class TextPageController extends BasePagesController
{
    public const  ROUTE_EDIT = 'cc.text-pages.edit';
    public const  ROUTE_UPDATE = 'cc.text-pages.update';
    protected const VIEW_FOR_EDIT = 'admin.pages.text_page.edit';

    protected function installModelPage(): void
    {
        $this->modelPage = new TextPage();
    }
}
