<?php

namespace App\Providers;

use App\Models\Node;
use App\Services\Repositories\Node\EloquentNodeRepository;
use App\Services\StructureTypes\RepositoryAssociation;
use App\Services\StructureTypes\Type;
use App\Services\StructureTypes\TypeContainer;
use Illuminate\Support\ServiceProvider;

class StructureTypesServiceProvider extends ServiceProvider
{
    //const REPO_HOME_PAGE = 'home_page_repo';
    //const REPO_TEXT_PAGE = 'text_page_repo';
    //const REPO_PROJECTS_PAGE = 'projects_page_repo';
    //const REPO_EQUIPMENT_PAGE = 'equipment_page_repo';

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            TypeContainer::class,
            function () {
                $typeContainer = new TypeContainer(
                    $this->app->make(EloquentNodeRepository::class)
                );

               /* $typeContainer->addRepositoryAssociation(
                    self::REPO_HOME_PAGE,
                    new RepositoryAssociation(
                        $this->app->make(EloquentHomePageRepository::class),
                        function (Node $node) {
                            return route('cc.home-pages.edit', [$node->id]);
                        }
                    )
                );*/

                /*$typeContainer->addRepositoryAssociation(
                    self::REPO_TEXT_PAGE,
                    new RepositoryAssociation(
                        $this->app->make(EloquentTextPageRepository::class),
                        function (Node $node) {
                            return route('cc.text-pages.edit', [$node->id]);
                        }
                    )
                );*/


                /*$typeContainer->addType(
                    Node::TYPE_HOME_PAGE,
                    new Type(
                        'Главная страница',
                        true,
                        self::REPO_HOME_PAGE,
                        function () {
                            return route('home');
                        }
                    )
                );*/


                /*$typeContainer->addType(
                    Node::TYPE_TEXT_PAGE,
                    new Type(
                        'Текстовая страница',
                        false,
                        self::REPO_TEXT_PAGE,
                        function (Node $node) {
                            return route('dynamic_page', implode('/', $node->getAliasPath()));
                        }
                    )
                );*/


                return $typeContainer;
            }
        );

        $this->app->bind('structure_types.types', TypeContainer::class);
    }
}
