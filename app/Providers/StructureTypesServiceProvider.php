<?php

namespace App\Providers;

use App\Http\Controllers\Admin\PageControllers\CompetencePageController;
use App\Http\Controllers\Admin\PageControllers\HomePageController;
use App\Http\Controllers\Admin\PageControllers\OurWorkPageController;
use App\Http\Controllers\Admin\PageControllers\ReviewPageController;
use App\Http\Controllers\Admin\PageControllers\ServicePageController;
use App\Http\Controllers\Admin\PageControllers\TargetAudiencePageController;
use App\Http\Controllers\Admin\PageControllers\TextPageController;
use App\Models\Node;
use App\Services\Repositories\Pages\CompetencePage\CompetencePageRepository;
use App\Services\Repositories\Pages\HomePage\HomePageRepository;
use App\Services\Repositories\Node\NodeRepository;
use App\Services\Repositories\Pages\OurWorkPage\OurWorkPageRepository;
use App\Services\Repositories\Pages\ReviewPage\ReviewPageRepository;
use App\Services\Repositories\Pages\ServicePage\ServicePageRepository;
use App\Services\Repositories\Pages\TargetAudiencePage\TargetAudiencePageRepository;
use App\Services\Repositories\Pages\TextPage\TextPageRepository;
use App\Services\StructureTypes\RepositoryAssociation;
use App\Services\StructureTypes\Type;
use App\Services\StructureTypes\TypeContainer;
use Illuminate\Support\ServiceProvider;

class StructureTypesServiceProvider extends ServiceProvider
{
    public const REPO_HOME_PAGE = 'home_page_repo';
    public const REPO_TARGET_AUDIENCE_PAGE = 'target_audience_page_repo';
    public const REPO_TEXT_PAGE = 'text_page_repo';
    public const REPO_COMPETENCE_PAGE = 'competence_page_repo';
    public const REPO_SERVICE_PAGE = 'service_page_repo';
    public const REPO_OUR_WORK_PAGE = 'our_work_page_repo';
    public const REPO_REVIEW_PAGE = 'review_page_repo';

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
                        fn(Node $node) => route(HomePageController::ROUTE_EDIT, [$node->id])
                    )
                );

                $typeContainer->addRepositoryAssociation(
                    self::REPO_TARGET_AUDIENCE_PAGE,
                    new RepositoryAssociation(
                        $this->app->make(TargetAudiencePageRepository::class),
                        fn(Node $node) => route(TargetAudiencePageController::ROUTE_EDIT, [$node->id])
                    )
                );

                $typeContainer->addRepositoryAssociation(
                    self::REPO_SERVICE_PAGE,
                    new RepositoryAssociation(
                        $this->app->make(ServicePageRepository::class),
                        fn(Node $node) => route(ServicePageController::ROUTE_EDIT, [$node->id])
                    )
                );

                $typeContainer->addRepositoryAssociation(
                    self::REPO_COMPETENCE_PAGE,
                    new RepositoryAssociation(
                        $this->app->make(CompetencePageRepository::class),
                        fn(Node $node) => route(CompetencePageController::ROUTE_EDIT, [$node->id])
                    )
                );

                /*$typeContainer->addRepositoryAssociation(
                    self::REPO_OUR_WORK_PAGE,
                    new RepositoryAssociation(
                        $this->app->make(OurWorkPageRepository::class),
                        fn(Node $node) => route(OurWorkPageController::ROUTE_EDIT, [$node->id])
                    )
                );*/

                /*$typeContainer->addRepositoryAssociation(
                    self::REPO_REVIEW_PAGE,
                    new RepositoryAssociation(
                        $this->app->make(ReviewPageRepository::class),
                        fn(Node $node) => route(ReviewPageController::ROUTE_EDIT, [$node->id])
                    )
                );*/

                $typeContainer->addRepositoryAssociation(
                    self::REPO_TEXT_PAGE,
                    new RepositoryAssociation(
                        $this->app->make(TextPageRepository::class),
                        fn(Node $node) => route(TextPageController::ROUTE_EDIT, [$node->id])
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
                        fn() => route('target-audiences')
                    )
                );

                $typeContainer->addType(
                    Node::TYPE_COMPETENCE_PAGE,
                    new Type(
                        'Компетенции',
                        true,
                        self::REPO_COMPETENCE_PAGE,
                        fn() => route('competencies')
                    )
                );

                $typeContainer->addType(
                    Node::TYPE_SERVICE_PAGE,
                    new Type(
                        'Услуги',
                        true,
                        self::REPO_SERVICE_PAGE,
                        fn() => route('services')
                    )
                );

                /*$typeContainer->addType(
                    Node::TYPE_OUR_WORK_PAGE,
                    new Type(
                        'Наши работы',
                        true,
                        self::REPO_OUR_WORK_PAGE,
                        fn() => route('our-works')
                    )
                );*/

                /*$typeContainer->addType(
                    Node::TYPE_REVIEW_PAGE,
                    new Type(
                        'Отзывы',
                        true,
                        self::REPO_REVIEW_PAGE,
                        fn() => route('reviews')
                    )
                );*/

                $typeContainer->addType(
                    Node::TYPE_TEXT_PAGE,
                    new Type(
                        'Текстовая страница',
                        false,
                        self::REPO_TEXT_PAGE,
                        fn(Node $node) => route('dynamic_page', implode('/', $node->getAliasPath()))
                    )
                );


                return $typeContainer;
            }
        );

        $this->app->bind('structure_types.types', TypeContainer::class);
    }
}
