<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Http\Controllers\Client\PageControllers\PageController;
use App\Models\Node;

final class TargetAudiencePageController extends PageController
{

    protected function getTypePage(): string
    {
        return Node::TYPE_TARGET_AUDIENCE_PAGE;
    }


    protected function getView(): string
    {
        return 'client.target_audience_page.show';
    }
}
