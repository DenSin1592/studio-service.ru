<?php

namespace App\Providers;

use App\Services\FormProcessors\AdminRole\AdminRoleFormProcessor;
use App\Services\FormProcessors\AdminUser\AdminUserFormProcessor;
use App\Services\FormProcessors\Node\NodeFormProcessor;
use App\Services\FormProcessors\Settings\SettingsFormProcessor;
use App\Services\FormProcessors\TargetAudience\TargetAudienceFormProcessor;
use App\Services\Repositories\AdminRole\CreateUpdateWrapper as AdminRoleCreateUpdateWrapper;
use App\Services\Repositories\AdminUser\CreateUpdateWrapper as AdminUserCreateUpdateWrapper;
use App\Services\Repositories\Setting\CreateUpdateWrapper as SettingCreateUpdateWrapper;
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
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            AdminUserFormProcessor::class,
            function () {
                $formProcessor = new AdminUserFormProcessor(
                    new AdminUserLaravelValidator($this->app['validator']),
                    $this->app->make(AdminUserCreateUpdateWrapper::class)
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
                    $this->app->make(AdminRoleCreateUpdateWrapper::class)
                );
                $formProcessor->addSubProcessor($this->app->make(\App\Services\FormProcessors\AdminRole\SubProcessor\Creator::class));

                return $formProcessor;
            }
        );

        $this->app->bind(
            NodeFormProcessor::class,
            function () {
                return new NodeFormProcessor(
                    new NodeLaravelValidator($this->app['validator'], $this->app['structure_types.types']),
                    $this->app->make(\App\Services\Repositories\Node\CreateUpdateWrapper::class)
                );
            }
        );

        $this->app->bind(
            TargetAudienceFormProcessor::class,
            function () {
                return new TargetAudienceFormProcessor(
                    new TargetAudienceLaravelValidator($this->app['validator']),
                    $this->app->make(\App\Services\Repositories\TargetAudienceRepository\EloquentTargetAudienceRepository::class)
                );
            }
        );

        $this->app->bind(
            SettingsFormProcessor::class,
            function () {
                return new SettingsFormProcessor(
                    $this->app->make(SettingsLaravelValidator::class),
                    $this->app->make(SettingCreateUpdateWrapper::class),
                    $this->app->make(EloquentSettingRepository::class),
                    $this->app->make(SettingContainer::class)
                );
            }
        );

        /*$this->app->bind(HomePageFormProcessor::class, function (Application $app) {
            return new HomePageFormProcessor(
                new HomePageValidator(
                    $app['validator']
                ),
                $app->make(EloquentHomePageRepository::class),
            );
        });*/


        /*$this->app->bind(TextPageFormProcessor::class, function (Application $app) {
            return new TextPageFormProcessor(
                new TextPageValidator(
                    $app['validator']
                ),
                $app->make(EloquentTextPageRepository::class),
            );
        });*/

    }
}
