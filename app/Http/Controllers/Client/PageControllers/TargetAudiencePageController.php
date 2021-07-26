<?php

namespace App\Http\Controllers\Client\PageControllers;
use App\Http\Controllers\Client\BasePagesController;

use App\Models\Node;

final class TargetAudiencePageController extends BasePagesController
{
    protected const TYPE_PAGE = Node::TYPE_TARGET_AUDIENCE_PAGE;
    protected const VIEW_FOR_SHOW = 'client.target_audience_page.show';
}
