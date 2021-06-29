<?php

namespace App\Providers;

use App\Http\Controllers\Admin\PageControllers\HomePageController;
use App\Http\Controllers\Admin\PageControllers\TargetAudiencePageController;
use App\Models\Node;
use App\Services\Repositories\Pages\HomePage\HomePageRepository;
use App\Services\Repositories\Node\NodeRepository;
use App\Services\Repositories\Pages\TargetAudiencePage\TargetAudiencePageRepository;
use App\Services\StructureTypes\RepositoryAssociation;
use App\Services\StructureTypes\Type;
use App\Services\StructureTypes\TypeContainer;
use Illuminate\Support\ServiceProvider;

class StructureTypesServiceProvider extends ServiceProvider
{
    public const REPO_HOME_PAGE = 'home_page_repo';
    public const REPO_TARGET_AUDIENCE_PAGE = 'target_audience_page_repo';

    public function register(): void
    {
        $this->app->singleton(
            TypeContainer::class,
            function () {
                $typeContainer = new TypeContainer(
                    $this->app->make(NodeRepository::class)
                );


                $typeContainer->addRepositoryAssociation(
                    self::REPO_HOME_PAGE,
                    new RepositoryAssociation(
                        $this->app->make(HomePageRepository::class),
                        function (Node $node) {
                            return route(HomePageController::ROUTE_EDIT, [$node->id]);
                        }
                    )
                );

                $typeContainer->addRepositoryAssociation(
                    self::REPO_TARGET_AUDIENCE_PAGE,
                    new RepositoryAssociation(
                        $this->app->make(TargetAudiencePageRepository::class),
                        function (Node $node) {
                            return route(TargetAudiencePageController::ROUTE_EDIT, [$node->id]);
                        }
                    )
                );


                $typeContainer->addType(
                    Node::TYPE_HOME_PAGE,
                    new Type(
                        'Главная страница',
                        true,
                        self::REPO_HOME_PAGE,
                        fn() => route('home')
                    )
                );

                $typeContainer->addType(
                    Node::TYPE_TARGET_AUDIENCE_PAGE,
                    new Type(
                        'Целевая аудитория',
                        true,
                        self::REPO_TARGET_AUDIENCE_PAGE,
                        fn() => route('target-audience')
                    )
                );


                return $typeContainer;
            }
        );

        $this->app->bind('structure_types.types', TypeContainer::class);
    }
}
