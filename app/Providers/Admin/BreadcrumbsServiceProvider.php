<?php

namespace App\Providers\Admin;

use App\Http\Controllers\Admin\EssenceControllers\CompetenciesController;
use App\Http\Controllers\Admin\EssenceControllers\OffersController;
use App\Http\Controllers\Admin\EssenceControllers\OurWorksController;
use App\Http\Controllers\Admin\EssenceControllers\ServicesController;
use App\Http\Controllers\Admin\EssenceControllers\StructureController;
use App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController;
use App\Http\Controllers\Admin\PageControllers\HomePageController;
use App\Http\Controllers\Admin\EssenceControllers\ReviewsController;
use App\Http\Controllers\Admin\PageControllers\TargetAudiencePageController;
use App\Models\HomePage;
use App\Models\Node;
use App\Models\TargetAudiencePage;
use App\Services\Admin\Breadcrumbs\Breadcrumbs;
use App\Services\Admin\Breadcrumbs\Path;
use Illuminate\Support\ServiceProvider;

class BreadcrumbsServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            Breadcrumbs::class,
            function () {
                $breadcrumbs = new Breadcrumbs();
                $this->addStructureBuilders($breadcrumbs);
                return $breadcrumbs;
            }
        );
    }


    private function addStructureBuilders(Breadcrumbs $breadcrumbs)
    {
        $breadcrumbs->addBuilder(
            StructureController::BREADCRUMBS_CREATE,
            function (Node $node) {
                $path = $this->createNodeParentPath($node);
                $path->add('Создание страницы');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            StructureController::BREADCRUMBS_EDIT,
            function (Node $node) {
                $path = $this->createNodeParentPath($node);
                $path->add($node->name);
                return $path;
            }
        );


        $breadcrumbs->addBuilder(
            ReviewsController::BREADCRUMBS_CREATE,
            function () {
                $path = new Path();
                $path->add(ReviewsController::INDEX_TITLE, route(ReviewsController::ROUTE_INDEX));
                $path->add('Создание');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            ReviewsController::BREADCRUMBS_EDIT,
            function () {
                $path = new Path();
                $path->add(ReviewsController::INDEX_TITLE, route(ReviewsController::ROUTE_INDEX));
                $path->add('Редактирование');
                return $path;
            }
        );


        $breadcrumbs->addBuilder(
            OurWorksController::BREADCRUMBS_CREATE,
            function () {
                $path = new Path();
                $path->add(OurWorksController::INDEX_TITLE, route(OurWorksController::ROUTE_INDEX));
                $path->add('Создание');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            OurWorksController::BREADCRUMBS_EDIT,
            function () {
                $path = new Path();
                $path->add(OurWorksController::INDEX_TITLE, route(OurWorksController::ROUTE_INDEX));
                $path->add('Редактирование');
                return $path;
            }
        );



        (static function(Breadcrumbs $breadcrumbs){   //Каталоги
            $breadcrumbs->addBuilder(
                TargetAudiencesController::BREADCRUMBS_CREATE,
                function () {
                    $path = new Path();
                    $path->add(TargetAudiencesController::INDEX_TITLE, route(TargetAudiencesController::ROUTE_INDEX));
                    $path->add('Создание');
                    return $path;
                }
            );
            $breadcrumbs->addBuilder(
                TargetAudiencesController::BREADCRUMBS_EDIT,
                function () {
                    $path = new Path();
                    $path->add(TargetAudiencesController::INDEX_TITLE, route(TargetAudiencesController::ROUTE_INDEX));
                    $path->add('Редактирование');
                    return $path;
                }
            );


            $breadcrumbs->addBuilder(
                CompetenciesController::BREADCRUMBS_CREATE,
                function () {
                    $path = new Path();
                    $path->add(CompetenciesController::INDEX_TITLE, route(CompetenciesController::ROUTE_INDEX));
                    $path->add('Создание');
                    return $path;
                }
            );
            $breadcrumbs->addBuilder(
                CompetenciesController::BREADCRUMBS_EDIT,
                function () {
                    $path = new Path();
                    $path->add(CompetenciesController::INDEX_TITLE, route(CompetenciesController::ROUTE_INDEX));
                    $path->add('Редактирование');
                    return $path;
                }
            );


            $breadcrumbs->addBuilder(
                ServicesController::BREADCRUMBS_CREATE,
                function () {
                    $path = new Path();
                    $path->add(ServicesController::INDEX_TITLE, route(ServicesController::ROUTE_INDEX));
                    $path->add('Создание');
                    return $path;
                }
            );
            $breadcrumbs->addBuilder(
                ServicesController::BREADCRUMBS_EDIT,
                function () {
                    $path = new Path();
                    $path->add(ServicesController::INDEX_TITLE, route(ServicesController::ROUTE_INDEX));
                    $path->add('Редактирование');
                    return $path;
                }
            );


            $breadcrumbs->addBuilder(
                OffersController::BREADCRUMBS_CREATE,
                function () {
                    $path = new Path();
                    $path->add(OffersController::INDEX_TITLE, route(OffersController::ROUTE_INDEX));
                    $path->add('Создание');
                    return $path;
                }
            );
            $breadcrumbs->addBuilder(
                OffersController::BREADCRUMBS_EDIT,
                function () {
                    $path = new Path();
                    $path->add(OffersController::INDEX_TITLE, route(OffersController::ROUTE_INDEX));
                    $path->add('Редактирование');
                    return $path;
                }
            );
        })($breadcrumbs);


    }


    private function createNodeParentPath(Node $node): Path
    {
        $path = new Path();
        $path->add('Структура сайта', route(StructureController::ROUTE_INDEX));

        foreach ($node->extractParentPath() as $nodeInPath) {
            $url = route(StructureController::ROUTE_EDIT, $nodeInPath->id);
            $page = \TypeContainer::getContentModelFor($nodeInPath);

            if ($page instanceof HomePage) {
                $url = route(HomePageController::ROUTE_EDIT, $nodeInPath->id);
            }
            if ($page instanceof TargetAudiencePage) {
                $url = route(TargetAudiencePageController::ROUTE_EDIT, $nodeInPath->id);
            }

            $path->add($nodeInPath->name, $url);
        }

        return $path;
    }
}
