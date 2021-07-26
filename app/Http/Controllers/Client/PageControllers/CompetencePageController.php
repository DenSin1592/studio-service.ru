<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Http\Controllers\Client\BasePagesController;
use App\Models\Node;

final class CompetencePageController extends BasePagesController
{
    protected const TYPE_PAGE = Node::TYPE_COMPETENCE_PAGE;
    protected const VIEW_FOR_SHOW = 'client.competence_page.show';
}
