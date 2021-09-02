<?php

namespace App\Providers\Admin;

use App\Http\Controllers\Admin\EssenceControllers\BeforeAfterImagesController;
use App\Http\Controllers\Admin\EssenceControllers\CompetenciesController;
use App\Http\Controllers\Admin\EssenceControllers\FeedbackController;
use App\Http\Controllers\Admin\EssenceControllers\OffersController;
use App\Http\Controllers\Admin\EssenceControllers\OurWorksController;
use App\Http\Controllers\Admin\EssenceControllers\ServicesController;
use App\Http\Controllers\Admin\EssenceControllers\StructureController;
use App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController;
use App\Http\Controllers\Admin\PageControllers\CompetencePageController;
use App\Http\Controllers\Admin\PageControllers\HomePageController;
use App\Http\Controllers\Admin\EssenceControllers\ReviewsController;
use App\Http\Controllers\Admin\PageControllers\ServicePageController;
use App\Http\Controllers\Admin\PageControllers\TargetAudiencePageController;
use App\Http\Controllers\Admin\PageControllers\TextPageController;
use App\Models\BeforeAfterImage;
use App\Models\Competence;
use App\Models\CompetencePage;
use App\Models\Feedback;
use App\Models\HomePage;
use App\Models\Node;
use App\Models\Offer;
use App\Models\OurWork;
use App\Models\Review;
use App\Models\Service;
use App\Models\ServicePage;
use App\Models\TargetAudience;
use App\Models\TargetAudiencePage;
use App\Models\TextPage;
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
            function (Review $model) {
                $path = new Path();
                $path->add(ReviewsController::INDEX_TITLE, route(ReviewsController::ROUTE_INDEX));
                $path->add("$model->name - редактирование");
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
            function (OurWork $model) {
                $path = new Path();
                $path->add(OurWorksController::INDEX_TITLE, route(OurWorksController::ROUTE_INDEX));
                $path->add("$model->name - редактирование");
                return $path;
            }
        );


        $breadcrumbs->addBuilder(
            FeedbackController::BREADCRUMBS_CREATE,
            function () {
                $path = new Path();
                $path->add(FeedbackController::INDEX_TITLE, route(FeedbackController::ROUTE_INDEX));
                $path->add('Создание');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            FeedbackController::BREADCRUMBS_EDIT,
            function (Feedback $model) {
                $path = new Path();
                $path->add(FeedbackController::INDEX_TITLE, route(FeedbackController::ROUTE_INDEX));
                $path->add(($model->name) ? "$model->name - редактирование" : 'Редактирование');
                return $path;
            }
        );


        $breadcrumbs->addBuilder(
            BeforeAfterImagesController::BREADCRUMBS_CREATE,
            function () {
                $path = new Path();
                $path->add('Справочники');
                $path->add(BeforeAfterImagesController::INDEX_TITLE, route(BeforeAfterImagesController::ROUTE_INDEX));
                $path->add('Создание');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            BeforeAfterImagesController::BREADCRUMBS_EDIT,
            function (BeforeAfterImage $model) {
                $path = new Path();
                $path->add('Справочники');
                $path->add(BeforeAfterImagesController::INDEX_TITLE, route(BeforeAfterImagesController::ROUTE_INDEX));
                $path->add("$model->name - редактирование");
                return $path;
            }
        );


        //Каталоги
        (static function(Breadcrumbs $breadcrumbs){
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
                function (TargetAudience $model) {
                    $path = new Path();
                    $path->add(TargetAudiencesController::INDEX_TITLE, route(TargetAudiencesController::ROUTE_INDEX));
                    if($parentModel = $model->parent){
                         $path->add($parentModel->name, route(TargetAudiencesController::ROUTE_EDIT, $parentModel->id));
                    }
                    $path->add("$model->name - редактирование");
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
                function (Competence $model) {
                    $path = new Path();
                    $path->add(CompetenciesController::INDEX_TITLE, route(CompetenciesController::ROUTE_INDEX));
                    $path->add("$model->name - редактирование");
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
                function (Service $model) {
                    $path = new Path();
                    $path->add(ServicesController::INDEX_TITLE, route(ServicesController::ROUTE_INDEX));
                    $path->add("$model->name - редактирование");
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
                function (Offer $model) {
                    $path = new Path();
                    $path->add(OffersController::INDEX_TITLE, route(OffersController::ROUTE_INDEX));
                    $path->add("$model->name - редактирование");
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
            if ($page instanceof CompetencePage) {
                $url = route(CompetencePageController::ROUTE_EDIT, $nodeInPath->id);
            }
            if ($page instanceof ServicePage) {
                $url = route(ServicePageController::ROUTE_EDIT, $nodeInPath->id);
            }
            if ($page instanceof TextPage) {
                $url = route(TextPageController::ROUTE_EDIT, $nodeInPath->id);
            }


            $path->add($nodeInPath->name, $url);
        }

        return $path;
    }
}
