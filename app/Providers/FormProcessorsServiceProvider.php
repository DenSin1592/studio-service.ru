<?php

namespace App\Providers;

use App\Services\FormProcessors\AdminRole\AdminRoleFormProcessor;
use App\Services\FormProcessors\AdminUser\AdminUserFormProcessor;
use App\Services\FormProcessors\Competence\CompetenceFormProcessor;
use App\Services\FormProcessors\Node\NodeFormProcessor;
use App\Services\FormProcessors\Settings\SettingsFormProcessor;
use App\Services\FormProcessors\TargetAudience\TargetAudienceFormProcessor;
use App\Services\Repositories\AdminRole\AdminRoleRepository;
use App\Services\Repositories\AdminUser\AdminUserRepository;
use App\Services\Repositories\Node\NodeRepository;
use App\Services\Repositories\Setting\SettingRepository;
use App\Services\Settings\SettingContainer;
use App\Services\Validation\AdminRole\AdminRoleValidator;
use App\Services\Validation\AdminUser\AdminUserValidator;
use App\Services\Validation\Competence\CompetenceValidator;
use App\Services\Validation\Node\NodeValidator;
use App\Services\Validation\Settings\SettingsValidator;
use App\Services\Validation\TargetAudience\TargetAudienceValidator;
use Illuminate\Support\ServiceProvider;

class FormProcessorsServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->bind(
            AdminUserFormProcessor::class,
            function () {
                $formProcessor = new AdminUserFormProcessor(
                    new AdminUserValidator($this->app['validator']),
                    $this->app->make(AdminUserRepository::class)
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
                    $this->app->make(AdminRoleRepository::class)
                );
                $formProcessor->addSubProcessor($this->app->make(\App\Services\FormProcessors\AdminRole\SubProcessor\Creator::class));
                return $formProcessor;
            }
        );


        $this->app->bind(
        CompetenceFormProcessor::class,
        function () {
            return new CompetenceFormProcessor(
                new CompetenceValidator($this->app['validator']),
                $this->app->make(\App\Services\Repositories\Competencies\CompetenciesRepository::class)
            );
        }
    );


        $this->app->bind(
            NodeFormProcessor::class,
            fn() => new NodeFormProcessor(
                new NodeValidator($this->app['validator'], $this->app['structure_types.types']),
                $this->app->make(NodeRepository::class)
            )
        );


        $this->app->bind(
            TargetAudienceFormProcessor::class,
            function () {
                return new TargetAudienceFormProcessor(
                    new TargetAudienceValidator($this->app['validator']),
                    $this->app->make(\App\Services\Repositories\TargetAudience\TargetAudienceRepository::class)
                );
            }
        );


        $this->app->bind(
            SettingsFormProcessor::class,
            fn() => new SettingsFormProcessor(
                $this->app->make(SettingsValidator::class),
                $this->app->make(SettingRepository::class),
                $this->app->make(SettingContainer::class)
            )
        );

    }
}
