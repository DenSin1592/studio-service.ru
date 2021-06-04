<?php

namespace App\Providers\Admin;

use App\Models\Node;
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
            'structure_page.create',
            function (Node $node) {
                $path = $this->createNodeParentPath($node);
                $path->add('Создание страницы');

                return $path;
            }
        );

        $breadcrumbs->addBuilder(
            'structure_page.edit',
            function (Node $node) {
                $path = $this->createNodeParentPath($node);
                $path->add($node->name);

                return $path;
            }
        );
    }

    private function createNodeParentPath(Node $node): Path
    {
        $path = new Path();

        $path->add('Структура сайта', route('cc.structure.index'));

        foreach ($node->extractParentPath() as $nodeInPath) {
            $url = route('cc.structure.edit', $nodeInPath->id);
            /*$page = \TypeContainer::getContentModelFor($nodeInPath);

            if (null !== $page && $page->exists) {
                if ($page instanceof TextPage) {
                    $url = route('cc.text-pages.edit', $nodeInPath->id);

                } elseif ($page instanceof HomePage) {
                    $url = route('cc.home-pages.edit', $nodeInPath->id);

                }
            }*/

            $path->add($nodeInPath->name, $url);
        }

        return $path;
    }
}
