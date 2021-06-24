<?php

namespace App\Providers;

use App\Services\FormProcessors\AdminRole\AdminRoleFormProcessor;
use App\Services\FormProcessors\AdminUser\AdminUserFormProcessor;
use App\Services\FormProcessors\Node\NodeFormProcessor;
use App\Services\FormProcessors\Settings\SettingsFormProcessor;
use App\Services\FormProcessors\TargetAudience\TargetAudienceFormProcessor;
use App\Services\Repositories\AdminRole\EloquentAdminRoleRepository;
use App\Services\Repositories\AdminUser\EloquentAdminUserRepository;
use App\Services\Repositories\Node\EloquentNodeRepository;
use App\Services\Repositories\Setting\EloquentSettingRepository;
use App\Services\Settings\SettingContainer;
use App\Services\Validation\AdminRole\AdminRoleValidator;
use App\Services\Validation\AdminUser\AdminUserLaravelValidator;
use App\Services\Validation\Node\NodeLaravelValidator;
use App\Services\Validation\Setting\SettingsLaravelValidator;
use App\Services\Validation\TargetAudience\TargetAudienceLaravelValidator;
use Illuminate\Support\ServiceProvider;

class FormProcessorsServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind(
            AdminUserFormProcessor::class,
            function () {
                $formProcessor = new AdminUserFormProcessor(
                    new AdminUserLaravelValidator($this->app['validator']),
                    $this->app->make(EloquentAdminUserRepository::class)
                );
                $formProcessor->addSubProcessor($this->app->make(\App\Services\FormProcessors\AdminUser\SubProcessor\Creator::class));
                return $formProcessor;
            }
        );


        $this->app->bind(
            AdminRoleFormProcessor::class,
            function () {
                $formProcessor = new AdminRoleFormProcessor(
                    new AdminRoleValidator($this->app['validator'], $this->app['acl']),
                    $this->app->make(EloquentAdminRoleRepository::class)
                );
                $formProcessor->addSubProcessor($this->app->make(\App\Services\FormProcessors\AdminRole\SubProcessor\Creator::class));
                return $formProcessor;
            }
        );


        $this->app->bind(
            NodeFormProcessor::class,
            fn() => new NodeFormProcessor(
                new NodeLaravelValidator($this->app['validator'], $this->app['structure_types.types']),
                $this->app->make(EloquentNodeRepository::class)
            )
        );


        $this->app->bind(
            TargetAudienceFormProcessor::class,
            function () {
                return new TargetAudienceFormProcessor(
                    new TargetAudienceLaravelValidator($this->app['validator']),
                    $this->app->make(\App\Services\Repositories\TargetAudience\EloquentTargetAudienceRepository::class)
                );
            }
        );


        $this->app->bind(
            SettingsFormProcessor::class,
            fn() => new SettingsFormProcessor(
                $this->app->make(SettingsLaravelValidator::class),
                $this->app->make(EloquentSettingRepository::class),
                $this->app->make(SettingContainer::class)
            )
        );

    }
}
