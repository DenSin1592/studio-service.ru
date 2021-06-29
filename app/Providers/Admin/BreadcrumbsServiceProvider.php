<?php

namespace App\Providers\Admin;

use App\Http\Controllers\Admin\PageControllers\HomePageController;
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
            function (TargetAudience $model) {
                $path = new Path();
                $path->add('Каталог ЦА', route(TargetAudiencesController::ROUTE_INDEX));
                $path->add('Создание ЦА');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            'target_audiences.edit',
            function (TargetAudience $model) {
                $path = new Path();
                $path->add('Каталог ЦА', route(TargetAudiencesController::ROUTE_INDEX));
                $path->add('Редактирование ЦА');
                return $path;
            }
        );


        $breadcrumbs->addBuilder(
            'competences.create',
            function (Competence $model) {
                $path = new Path();
                $path->add('Каталог Компетенций', route(TargetAudiencesController::ROUTE_INDEX));
                $path->add('Создание Компетенции');
                return $path;
            }
        );
        $breadcrumbs->addBuilder(
            'competences.edit',
            function (Competence $model) {
                $path = new Path();
                $path->add('Каталог Компетенций', route(TargetAudiencesController::ROUTE_INDEX));
                $path->add('Редактирование Компетенции');
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
