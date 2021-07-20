<?php

namespace App\Providers;

use App\Services\DataProviders\AdminRoleForm\AdminRoleForm;
use App\Services\DataProviders\AdminRoleForm\AdminRoleSubForm\Abilities;
use App\Services\DataProviders\AdminUserForm\AdminUserForm;
use App\Services\DataProviders\AdminUserForm\AdminUserSubForm\Roles;
use App\Services\DataProviders\ReviewForm\ReviewForm;
use App\Services\DataProviders\ReviewForm\ReviewSubForm\Images;
use App\Services\DataProviders\ServiceForm\ServiceForm;
use App\Services\DataProviders\ServiceForm\ServiceSubForm\Competencies;
use App\Services\DataProviders\SettingsForm\SettingsForm;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class DataProvidersServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AdminRoleForm::class,
            fn() =>  new AdminRoleForm(
            'role',
                [
                    \App(Abilities::class),
                ]));


        $this->app->bind(AdminUserForm::class,
            fn() =>  new AdminUserForm(
                'user',
                [
                    \App(Roles::class)
                ]));

        $this->app->bind(ReviewForm::class,
            fn() =>  new ReviewForm(
                'review',
                [
                    \App(Images::class)
                ]));


        $this->app->bind(ServiceForm::class,
            fn() =>  new ServiceForm(
                'service',
                [
                    \App(Competencies::class)
                ]));


        $this->app->bind(SettingsForm::class,
            fn() =>  new SettingsForm(
                'settings',
                [

                ]));

    }
}
