<?php

namespace App\Providers;

use App\Services\DataProviders\AdminRoleForm\AdminRoleForm;
use App\Services\DataProviders\AdminRoleForm\AdminRoleSubForm\Abilities;
use App\Services\DataProviders\AdminUserForm\AdminUserForm;
use App\Services\DataProviders\AdminUserForm\AdminUserSubForm\Roles;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class DataProvidersServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            AdminRoleForm::class,
            function (Application $app) {
                $form = new AdminRoleForm();
                $form->addSubForm($app->make(Abilities::class));

                return $form;
            }
        );

        $this->app->bind(
            AdminUserForm::class,
            function (Application $app) {
                $form = new AdminUserForm();
                $form->addSubForm($app->make(Roles::class));

                return $form;
            }
        );
    }
}
