<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Http\Controllers\Client\BasePagesController;
use App\Http\Controllers\Client\EssenceControllers\CompetenceController;
use App\Models\Node;

final class CompetencePageController extends BasePagesController
{
    protected const TYPE_PAGE = Node::TYPE_COMPETENCE_PAGE;
    protected const VIEW_FOR_SHOW = 'client.competence_page.show';

    public function show()
    {
        return parent::show()
            ->with('modelList', resolve(CompetenceController::class)->getModelsForCompetencePage())
            ;
    }
}
