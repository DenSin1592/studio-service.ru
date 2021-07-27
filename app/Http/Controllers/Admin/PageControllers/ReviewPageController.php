<?php

namespace App\Http\Controllers\Admin\PageControllers;

use App\Http\Controllers\Admin\BasePagesController;
use App\Models\ReviewPage;

final class ReviewPageController extends BasePagesController
{
    public const  ROUTE_EDIT = 'cc.review-pages.edit';
    public const  ROUTE_UPDATE = 'cc.review-pages.update';
    protected const VIEW_FOR_EDIT = 'admin.pages.edit';

    protected function installModelPage(): void
    {
        $this->modelPage = new ReviewPage();
    }

}
