<?php

namespace App\Http\Controllers\Client\PageControllers;

use App\Http\Controllers\Client\BasePagesController;
use App\Http\Controllers\Client\EssenceControllers\CompetenceController;
use App\Http\Controllers\Client\EssenceControllers\OurWorkController;
use App\Http\Controllers\Client\EssenceControllers\ReviewController;
use App\Http\Controllers\Client\EssenceControllers\ServiceController;
use App\Http\Controllers\Client\EssenceControllers\TargetAudienceController;
use App\Models\Node;

final class HomePageController extends BasePagesController
{
    protected const TYPE_PAGE = Node::TYPE_HOME_PAGE;
    protected const VIEW_FOR_SHOW = 'client.home_page.show';

    public function show()
    {
        return parent::show()
            ->with('targetAudiences', resolve(TargetAudienceController::class)->getModelsForHomePage())
            ->with('services', resolve(ServiceController::class)->getModelsForHomePage())
            ->with('competencies', resolve(CompetenceController::class)->getModelsForHomePage())
            ->with('reviews', resolve(ReviewController::class)->getModelsForHomePage())
            ->with('projects', resolve(OurWorkController::class)->getModelsForHomePage())
            ;
    }

    protected function getBreadcrumbs(string $h1)
    {
        return null;
    }
}
