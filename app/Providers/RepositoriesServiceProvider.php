<?php

namespace App\Providers;

use App\Models\AdminRole;
use App\Models\AdminUser;
use App\Models\HomePage;
use App\Models\Node;
use App\Models\Setting;
use App\Models\TargetAudience;
use App\Models\TargetAudiencePage;
use App\Services\Repositories\AdminRole\EloquentAdminRoleRepository;
use App\Services\Repositories\AdminUser\EloquentAdminUserRepository;
use App\Services\Repositories\Node\EloquentNodeRepository;
use App\Services\Repositories\Pages\HomePage\EloquentHomePageRepository;
use App\Services\Repositories\Pages\TargetAudiencePage\EloquentTargetAudiencePageRepository;
use App\Services\Repositories\Setting\EloquentSettingRepository;
use App\Services\Repositories\TargetAudience\EloquentTargetAudienceRepository;
use App\Services\RepositoryFeatures\Attribute\EloquentAttributeToggler;
use App\Services\RepositoryFeatures\Attribute\PositionUpdater;
use App\Services\RepositoryFeatures\Order\OrderScopesInterface;
use App\Services\RepositoryFeatures\Tree\TreeBuilderInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->singleton(
            EloquentAdminRoleRepository::class,
            fn() => new EloquentAdminRoleRepository(new AdminRole())
        );


        $this->app->singleton(
            EloquentAdminUserRepository::class,
            fn() => new EloquentAdminUserRepository(new AdminUser())
        );


        $this->app->singleton(EloquentNodeRepository::class,
            fn() => new EloquentNodeRepository(
                \App(OrderScopesInterface::class),
                \App(TreeBuilderInterface::class),
                new EloquentAttributeToggler(),
                new PositionUpdater(),
                new Node()
            )
        );


        $this->app->singleton(
            EloquentHomePageRepository::class,
            fn() =>  new EloquentHomePageRepository(new HomePage())
        );


        $this->app->singleton(
            EloquentTargetAudiencePageRepository::class,
            fn() =>  new EloquentTargetAudiencePageRepository(new TargetAudiencePage())
        );


        $this->app-> singleton(
            EloquentSettingRepository::class,
            fn() => new EloquentSettingRepository(new Setting())
        );


        $this->app-> singleton(
            EloquentTargetAudienceRepository::class,
            fn() => new EloquentTargetAudienceRepository(
                \App(OrderScopesInterface::class),
                \App(TreeBuilderInterface::class),
                new EloquentAttributeToggler(),
                new PositionUpdater(),
                new TargetAudience()
            )
        );

    }
}
