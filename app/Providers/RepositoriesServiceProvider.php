<?php

namespace App\Providers;

use App\Models\AdminRole;
use App\Models\AdminUser;
use App\Models\Competence;
use App\Models\HomePage;
use App\Models\Node;
use App\Models\OurWork;
use App\Models\OurWorkImage;
use App\Models\Review;
use App\Models\ReviewImage;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TargetAudience;
use App\Models\TargetAudiencePage;
use App\Services\Repositories\AdminRole\AdminRoleRepository;
use App\Services\Repositories\AdminUser\AdminUserRepository;
use App\Services\Repositories\BaseRepository;
use App\Services\Repositories\Competencies\CompetenciesRepository;
use App\Services\Repositories\Node\NodeRepository;
use App\Services\Repositories\OurWork\OurWorkImage\OurWorkImageRepository;
use App\Services\Repositories\OurWork\OurWorkRepository;
use App\Services\Repositories\Pages\HomePage\HomePageRepository;
use App\Services\Repositories\Pages\TargetAudiencePage\TargetAudiencePageRepository;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;
use App\Services\Repositories\Review\ReviewRepository;
use App\Services\Repositories\Services\ServicesRepository;
use App\Services\Repositories\Setting\SettingRepository;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;
use App\Services\RepositoryFeatures\Attribute\EloquentAttributeToggler;
use App\Services\RepositoryFeatures\Attribute\PositionUpdater;
use App\Services\RepositoryFeatures\Order\OrderScopesInterface;
use App\Services\RepositoryFeatures\Tree\TreeBuilderInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->singleton(
            AdminRoleRepository::class,
            fn() => new AdminRoleRepository(new AdminRole())
        );


        $this->app->singleton(
            AdminUserRepository::class,
            fn() => new AdminUserRepository(new AdminUser())
        );


        $this->app->singleton(
            CompetenciesRepository::class,
            fn() => new CompetenciesRepository(
                new EloquentAttributeToggler(),
                new PositionUpdater(),
                new Competence()
            )
        );


        $this->app->singleton(
            HomePageRepository::class,
            fn() =>  new HomePageRepository(new HomePage())
        );


        $this->app->singleton(
            NodeRepository::class,
            fn() => new NodeRepository(
                \App(TreeBuilderInterface::class),
                new EloquentAttributeToggler(),
                new PositionUpdater(),
                new Node()
            )
        );


        $this->app->singleton(
            ReviewRepository::class,
            fn() => new ReviewRepository(
                new EloquentAttributeToggler(),
                new PositionUpdater(),
                new Review()
            )
        );


        $this->app->singleton(
            ReviewImageRepository::class,
            fn() => new ReviewImageRepository(new ReviewImage())
        );


        $this->app->singleton(
            OurWorkRepository::class,
            fn() => new OurWorkRepository(
                new EloquentAttributeToggler(),
                new PositionUpdater(),
                new OurWork()
            )
        );


        $this->app->singleton(
            OurWorkImageRepository::class,
            fn() => new OurWorkImageRepository(new OurWorkImage())
        );


        $this->app->singleton(
            ServicesRepository::class,
            fn() => new ServicesRepository(
                new EloquentAttributeToggler(),
                new PositionUpdater(),
                new Service()
            )
        );


        $this->app->singleton(
            SettingRepository::class,
            fn() => new SettingRepository(new Setting())
        );


        $this->app->singleton(
            TargetAudiencePageRepository::class,
            fn() =>  new TargetAudiencePageRepository(new TargetAudiencePage())
        );


        $this->app->singleton(
            TargetAudienceRepository::class,
            fn() => new TargetAudienceRepository(
                \App(TreeBuilderInterface::class),
                new EloquentAttributeToggler(),
                new PositionUpdater(),
                new TargetAudience()
            )
        );
    }
}
