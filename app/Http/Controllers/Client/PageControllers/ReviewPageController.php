<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Http\Controllers\Client\BasePagesController;
use App\Models\Node;

final class ReviewPageController extends BasePagesController
{
    protected const TYPE_PAGE = Node::TYPE_REVIEW_PAGE;
    protected const VIEW_FOR_SHOW = 'client.review_page.show';
}
