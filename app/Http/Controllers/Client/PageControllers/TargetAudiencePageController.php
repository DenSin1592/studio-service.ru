<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Http\Controllers\Client\PageControllers\PageController;
use App\Models\Node;

final class TargetAudiencePageController extends PageController
{
    protected const TYPE_PAGE = Node::TYPE_TARGET_AUDIENCE_PAGE;
    protected const VIEW_FOR_SHOW = 'client.target_audience_page.show';
}