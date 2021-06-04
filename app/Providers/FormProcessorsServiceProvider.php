<?php namespace App\Providers;

use App\Helpers\Device;
use App\Services\FormProcessors\Feedback\ClientFeedbackFormProcessor;
use App\Services\FormProcessors\Feedback\AdminFeedbackFormProcessor;
use App\Services\FormProcessors\HomePage\HomePageFormProcessor;
use App\Services\FormProcessors\TextPage\TextPageFormProcessor;
use App\Services\FormProcessors\ProjectsPage\ProjectsPageFormProcessor;
use App\Services\FormProcessors\EquipmentPage\EquipmentPageFormProcessor;
use App\Services\FormProcessors\Node\NodeFormProcessor;
use App\Services\FormProcessors\Project\ProjectFormProcessor;
use App\Services\FormProcessors\Project\SubProcessor as ProjectSubProcessor;
use App\Services\FormProcessors\Settings\SettingsFormProcessor;
use App\Services\Repositories\Feedback\CreateUpdateWrapper as FeedbackCreateUpdateWrapper;
use App\Services\Repositories\Feedback\EloquentFeedbackRepository;
use App\Services\Repositories\HomePage\EloquentHomePageRepository;
use App\Services\Repositories\TextPage\EloquentTextPageRepository;
use App\Services\Repositories\ProjectsPage\EloquentProjectsPageRepository;
use App\Services\Repositories\EquipmentPage\EloquentEquipmentPageRepository;
use App\Services\Repositories\Node\CreateUpdateWrapper as NodeCreateUpdateWrapper;
use App\Services\Repositories\Project\CreateUpdateWrapper as ProjectCreateUpdateWrapper;
use App\Services\Repositories\Project\EloquentProjectRepository;
use App\Services\Repositories\Setting\CreateUpdateWrapper as SettingCreateUpdateWrapper;
use App\Services\Repositories\Setting\EloquentSettingRepository;
use App\Services\Settings\SettingContainer;
use App\Services\Validation\Feedback\AdminFeedbackValidator;
use App\Services\Validation\Feedback\ClientFeedbackValidator;
use App\Services\Validation\Node\NodeLaravelValidator;
use App\Services\Validation\HomePage\HomePageValidator;
use App\Services\Validation\TextPage\TextPageValidator;
use App\Services\Validation\ProjectsPage\ProjectsPageValidator;
use App\Services\Validation\EquipmentPage\EquipmentPageValidator;
use App\Services\Validation\Project\ProjectLaravelValidator;
use App\Services\Validation\Setting\SettingsLaravelValidator;
use App\Services\Validation\ValidableInterface;
use Illuminate\Foundation\Application;
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
        /*$this->app->bind(
            NodeFormProcessor::class,
            function () {
                return new NodeFormProcessor(
                    new NodeLaravelValidator($this->app['validator'], $this->app['structure_types.types']),
                    $this->app->make(NodeCreateUpdateWrapper::class)
                );
            }
        );*/

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
