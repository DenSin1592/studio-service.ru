<?php

namespace App\Providers;

use App\Services\DataProviders\AdminRoleForm\AdminRoleForm;
use App\Services\DataProviders\AdminRoleForm\AdminRoleSubForm\Abilities;
use App\Services\DataProviders\AdminUserForm\AdminUserForm;
use App\Services\DataProviders\AdminUserForm\AdminUserSubForm\Roles;
use App\Services\DataProviders\CompetenceForm\CompetenceForm;
use App\Services\DataProviders\OfferForm\OfferForm;
use App\Services\DataProviders\OurWorkForm\OurWorkForm;
use App\Services\DataProviders\ReviewForm\ReviewForm;
use App\Services\DataProviders\ReviewForm\ReviewSubForm\Images;
use App\Services\DataProviders\ReviewForm\ReviewSubForm\Services;
use App\Services\DataProviders\ServiceForm\ServiceForm;
use App\Services\DataProviders\ServiceForm\ServiceSubForm\Competencies;
use App\Services\DataProviders\ServiceForm\ServiceSubForm\Tasks;
use App\Services\DataProviders\SettingsForm\SettingsForm;
use App\Services\DataProviders\TargetAudienceForm\TargetAudienceForm;
use Illuminate\Support\ServiceProvider;

class DataProvidersServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AdminRoleForm::class,
            static function() {
                $form = new AdminRoleForm();
                $form->addSubForm(\App(Abilities::class));
                return $form;
            });


        $this->app->bind(AdminUserForm::class,
            static function() {
                $form = new AdminUserForm();
                $form->addSubForm(\App(Roles::class));
                return $form;
            });


        $this->app->bind(CompetenceForm::class,
            static function() {
                $form = new CompetenceForm();
                return $form;
            });


        $this->app->bind(ReviewForm::class,
            static function() {
                $form = new ReviewForm();
                $form->addSubForm(\App(Images::class));
                $form->addSubForm(\App(Services::class));
                return $form;
            });


        $this->app->bind(OfferForm::class,
            static function() {
                $form = new OfferForm();
                $form->addSubForm(\App(\App\Services\DataProviders\OfferForm\OfferSubForm\Services::class));
                return $form;
            });


        $this->app->bind(OurWorkForm::class,
            static function() {
                $form = new OurWorkForm();
                $form->addSubForm(\App(\App\Services\DataProviders\OurWorkForm\OurWorkSubForm\Images::class));
                $form->addSubForm(\App(\App\Services\DataProviders\OurWorkForm\OurWorkSubForm\Services::class));
                return $form;
            });


        $this->app->bind(ServiceForm::class,
            static function() {
                $form = new ServiceForm();
                $form->addSubForm(\App(Competencies::class));
                $form->addSubForm(\App(Tasks::class));
                return $form;
            });


        $this->app->bind(SettingsForm::class,
            static function() {
                $form = new SettingsForm();
                return $form;
            });


        $this->app->bind(TargetAudienceForm::class,
            static function() {
                $form = new TargetAudienceForm();
                return $form;
            });

    }
}
