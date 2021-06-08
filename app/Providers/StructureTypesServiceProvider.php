<?php

namespace App\Providers;

use App\Models\Node;
use App\Services\Repositories\HomePage\EloquentHomePageRepository;
use App\Services\Repositories\Node\EloquentNodeRepository;
use App\Services\StructureTypes\RepositoryAssociation;
use App\Services\StructureTypes\Type;
use App\Services\StructureTypes\TypeContainer;
use Illuminate\Support\ServiceProvider;

class StructureTypesServiceProvider extends ServiceProvider
{
    const REPO_HOME_PAGE = 'home_page_repo';

    public function register(): void
    {
        $this->app->singleton(
            TypeContainer::class,
            function () {
                $typeContainer = new TypeContainer(
                    $this->app->make(EloquentNodeRepository::class)
                );

                 $typeContainer->addRepositoryAssociation(
                     self::REPO_HOME_PAGE,
                     new RepositoryAssociation(
                         $this->app->make(EloquentHomePageRepository::class),
                         function (Node $node) {
                             return route('cc.home-pages.edit', [$node->id]);
                         }
                     )
                 );

               $typeContainer->addType(
                    Node::TYPE_HOME_PAGE,
                    new Type(
                        'Главная страница',
                        true,
                        self::REPO_HOME_PAGE,
                        function () {
                            return route('home');
                        }
                    )
                );
                return $typeContainer;
            }
        );

        $this->app->bind('structure_types.types', TypeContainer::class);
    }
}
