<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Http\Controllers\Client\BasePagesController;
use App\Http\Controllers\Client\EssenceControllers\OurWorkController;
use App\Models\Node;

final class OurWorkPageController extends BasePagesController
{
    protected const TYPE_PAGE = Node::TYPE_OUR_WORK_PAGE;
    protected const VIEW_FOR_SHOW = 'client.our_work_page.show';

    public function show()
    {
        return parent::show()
            ->with('modelList', resolve(OurWorkController::class)->getModelsForProjectPage())
            ;
    }
}
