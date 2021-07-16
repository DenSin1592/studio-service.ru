<?php

namespace App\Providers\Admin;

use App\Http\Controllers\Admin\CompetenciesController;
use App\Http\Controllers\Admin\PageControllers\HomePageController;
use App\Http\Controllers\Admin\ReviewsController;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\StructureController;
use App\Http\Controllers\Admin\PageControllers\TargetAudiencePageController;
use App\Http\Controllers\Admin\TargetAudiencesController;
use App\Models\Competence;
use App\Models\HomePage;
use App\Models\Node;
use App\Models\TargetAudience;
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
            'structure.create',
            function (Node $node) {
                $path = $this->createNodeParentPath($node);
                $path->add('Создание страницы');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            'structure.edit',
            function (Node $node) {
                $path = $this->createNodeParentPath($node);
                $path->add($node->name);
                return $path;
            }
        );


        $breadcrumbs->addBuilder(
            'target_audiences.create',
            function () {
                $path = new Path();
                $path->add('Каталог ЦА', route(TargetAudiencesController::ROUTE_INDEX));
                $path->add('Создание ЦА');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            'target_audiences.edit',
            function () {
                $path = new Path();
                $path->add('Каталог ЦА', route(TargetAudiencesController::ROUTE_INDEX));
                $path->add('Редактирование ЦА');
                return $path;
            }
        );


        $breadcrumbs->addBuilder(
            'competences.create',
            function () {
                $path = new Path();
                $path->add('Каталог Компетенций', route(CompetenciesController::ROUTE_INDEX));
                $path->add('Создание Компетенции');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            'competences.edit',
            function () {
                $path = new Path();
                $path->add('Каталог Компетенций', route(CompetenciesController::ROUTE_INDEX));
                $path->add('Редактирование Компетенции');
                return $path;
            }
        );


        $breadcrumbs->addBuilder(
            'reviews.create',
            function () {
                $path = new Path();
                $path->add('Отзывы', route(ReviewsController::ROUTE_INDEX));
                $path->add('Создание отзыва');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            'reviews.edit',
            function () {
                $path = new Path();
                $path->add('Отзывы', route(ReviewsController::ROUTE_INDEX));
                $path->add('Редактирование отзыва');
                return $path;
            }
        );


        $breadcrumbs->addBuilder(
            'services.create',
            function () {
                $path = new Path();
                $path->add('Каталог услуг', route(ServicesController::ROUTE_INDEX));
                $path->add('Создание услуги');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            'services.edit',
            function () {
                $path = new Path();
                $path->add('Каталог услуг', route(ServicesController::ROUTE_INDEX));
                $path->add('Редактирование услуги');
                return $path;
            }
        );
    }


    private function createNodeParentPath(Node $node): Path
    {
        $path = new Path();
        $path->add('Структура сайта', route(StructureController::ROUTE_INDEX));

        foreach ($node->extractParentPath() as $nodeInPath) {
            $url = route('cc.structure.edit', $nodeInPath->id);
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
