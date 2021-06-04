<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DataProvidersServiceProvider extends ServiceProvider
{
    public function register()
    {
        /*$this->app->bind(
            ProjectForm::class,
            function (Application $app) {
                $form = new ProjectForm($app->make(EloquentProjectRepository::class));
                $form->addSubForm($app->make(ProjectSubForm\GalleryImages::class));
                $form->addSubForm($app->make(ProjectSubForm\Equipment::class));

                return $form;
            }
        );*/
    }
}
