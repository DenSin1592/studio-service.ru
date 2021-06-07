<?php namespace App\Providers\Admin;

use App\Http\Controllers\Admin\AdminRolesController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\SettingsController;
use App\Models\AdminUser;
use App\Policies\AdminUrlPolicy;
use App\Policies\AdminRolePolicy;
use App\Policies\AdminUserPolicy;
use App\Services\Admin\Acl\Acl;
use App\Services\Admin\Acl\Helpers\CheckHelper;
use App\Services\Admin\Acl\Helpers\RouteHelper;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AclServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->bootGates();
    }

    public function register(): void
    {
        $this->registerAcl();
        $this->registerHelpers();
    }

    private function bootGates(): void
    {
        Gate::before(function (AdminUser $user) {
            if ($user->isSuper()) {
                return true;
            }
        });

        foreach ($this->app['acl']->abilities()->keys() as $ability) {
            Gate::define($ability, AdminUrlPolicy::class . '@change');
        }

        Gate::define('change-admin-user', AdminUserPolicy::class . '@change');
        Gate::define('change-admin-role', AdminRolePolicy::class . '@change');
    }

    private function registerAcl(): void
    {
        $this->app->singleton(Acl::class, function () {
            $acl = new Acl($this->app->make(GateContract::class));

            $acl->define('change-site-structure', [
                StructureController::class,
                //HomePagesController::class,
                //TextPagesController::class,
                //MetaPagesController::class,
            ], 'Структура сайта');

            $acl->define('change-settings', [
                SettingsController::class,
            ], 'Константы');

            $acl->define('change-access-control', [
                AdminUsersController::class,
                AdminRolesController::class,
            ], 'Управление доступом');

            return $acl;
        });

        $this->app->alias(Acl::class, 'acl');
    }

    private function registerHelpers(): void
    {
        $this->app->singleton(RouteHelper::class, function () {
            return new RouteHelper($this->app['router']);
        });

        $this->app->singleton(CheckHelper::class, function () {
            return new CheckHelper(
                $this->app->make(Acl::class),
                $this->app->make(RouteHelper::class),
                $this->app->make('url')
            );
        });
    }
}
