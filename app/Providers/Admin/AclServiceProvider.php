<?php

namespace App\Providers\Admin;

use App\Http\Controllers\Admin\AdminRolesController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\EssenceControllers\BeforeAfterImagesController;
use App\Http\Controllers\Admin\EssenceControllers\CompetenciesController;
use App\Http\Controllers\Admin\EssenceControllers\FeedbackController;
use App\Http\Controllers\Admin\EssenceControllers\OffersController;
use App\Http\Controllers\Admin\EssenceControllers\OurWorksController;
use App\Http\Controllers\Admin\EssenceControllers\StructureController;
use App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController;
use App\Http\Controllers\Admin\PageControllers\CompetencePageController;
use App\Http\Controllers\Admin\PageControllers\HomePageController;
use App\Http\Controllers\Admin\EssenceControllers\ReviewsController;
use App\Http\Controllers\Admin\EssenceControllers\ServicesController;
use App\Http\Controllers\Admin\PageControllers\OurWorkPageController;
use App\Http\Controllers\Admin\PageControllers\ReviewPageController;
use App\Http\Controllers\Admin\PageControllers\ServicePageController;
use App\Http\Controllers\Admin\PageControllers\TextPageController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\PageControllers\TargetAudiencePageController;
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
                HomePageController::class,
                CompetencePageController::class,
                OurWorkPageController::class,
                ReviewPageController::class,
                ServicePageController::class,
                TextPageController::class,
                TargetAudiencePageController::class,
            ], 'Структура сайта');

            $acl->define('change-catalog', [
                CompetenciesController::class,
                ServicesController::class,
                TargetAudiencesController::class,
                OffersController::class,
            ], 'Каталоги');

            $acl->define('change-reference-books', [
                BeforeAfterImagesController::class
            ],'Справочники');

            $acl->define('change-feedback', [
                FeedbackController::class,
            ], 'Обратная связь');

            $acl->define('change-reviews', [
                ReviewsController::class,
            ], 'Отзывы');

            $acl->define('change-our-works', [
                OurWorksController::class,
            ], 'Проекты');

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
        $this->app->singleton(RouteHelper::class, fn() => new RouteHelper($this->app['router']));

        $this->app->singleton(CheckHelper::class,
            fn() => new CheckHelper(
                $this->app->make(Acl::class),
                $this->app->make(RouteHelper::class),
                $this->app->make('url')
            )
        );
    }
}
