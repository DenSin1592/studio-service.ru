<?php

namespace App\Providers;

use App\Services\FormProcessors\AdminRole\AdminRoleFormProcessor;
use App\Services\FormProcessors\AdminUser\AdminUserFormProcessor;
use App\Services\FormProcessors\BeforeAfterImage\BeforeAfterImageFormProcessor;
use App\Services\FormProcessors\Competence\CompetenceFormProcessor;
use App\Services\FormProcessors\Competence\SubProcessor\ContentBlocks;
use App\Services\FormProcessors\Feedback\FeedbackFormProcessor;
use App\Services\FormProcessors\Node\NodeFormProcessor;
use App\Services\FormProcessors\Offer\OfferFormProcessor;
use App\Services\FormProcessors\OurWork\OurWorkFormProcessor;
use App\Services\FormProcessors\Review\ReviewFormProcessor;
use App\Services\FormProcessors\Review\SubProcessor\Images;
use App\Services\FormProcessors\Service\ServiceFormProcessor;
use App\Services\FormProcessors\Service\SubProcessor\BeforeAfterImages;
use App\Services\FormProcessors\Service\SubProcessor\Competencies;
use App\Services\FormProcessors\Service\SubProcessor\FaqQuestions;
use App\Services\FormProcessors\Service\SubProcessor\Tabs;
use App\Services\FormProcessors\Service\SubProcessor\Tasks;
use App\Services\FormProcessors\Settings\SettingsFormProcessor;
use App\Services\FormProcessors\TargetAudience\TargetAudienceFormProcessor;
use App\Services\Repositories\AdminRole\AdminRoleRepository;
use App\Services\Repositories\AdminUser\AdminUserRepository;
use App\Services\Repositories\BeforeAfterImages\BeforeAfterImagesRepository;
use App\Services\Repositories\Competencies\CompetenciesRepository;
use App\Services\Repositories\Feedback\FeedbackRepository;
use App\Services\Repositories\Node\NodeRepository;
use App\Services\Repositories\Offer\OfferRepository;
use App\Services\Repositories\OurWork\OurWorkRepository;
use App\Services\Repositories\Review\ReviewRepository;
use App\Services\Repositories\Services\ServicesRepository;
use App\Services\Repositories\Setting\SettingRepository;
use App\Services\Validation\AdminRole\AdminRoleValidator;
use App\Services\Validation\AdminUser\AdminUserValidator;
use App\Services\Validation\BeforeAfterImage\BeforeAfterImageValidator;
use App\Services\Validation\Competence\CompetenceValidator;
use App\Services\Validation\Feedback\FeedbackValidator;
use App\Services\Validation\Node\NodeValidator;
use App\Services\Validation\Offer\OfferValidator;
use App\Services\Validation\OurWork\OurWorkValidator;
use App\Services\Validation\Review\ReviewValidator;
use App\Services\Validation\Service\ServiceValidator;
use App\Services\Validation\Settings\SettingsValidator;
use App\Services\Validation\TargetAudience\TargetAudienceValidator;
use App\Services\Settings\SettingContainer;
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
            BeforeAfterImageFormProcessor::class,
            function () {
                $formProcessor =  new BeforeAfterImageFormProcessor(
                    $this->app->make(BeforeAfterImageValidator::class),
                    $this->app->make(BeforeAfterImagesRepository::class)
                );
                return $formProcessor;
            }
        );


        $this->app->bind(
        CompetenceFormProcessor::class,
         function () {
             $formProcessor =  new CompetenceFormProcessor(
                $this->app->make(CompetenceValidator::class),
                $this->app->make(CompetenciesRepository::class)
            );
             $formProcessor->addSubProcessor(\App(ContentBlocks::class));
             return $formProcessor;
         }
        );

        $this->app->bind(
            FeedbackFormProcessor::class,
            fn() => new FeedbackFormProcessor(
                $this->app->make(FeedbackValidator::class),
                $this->app->make(FeedbackRepository::class)
            )
        );

        $this->app->bind(
            NodeFormProcessor::class,
            fn() => new NodeFormProcessor(
                new NodeValidator($this->app['validator'], $this->app['structure_types.types']),
                $this->app->make(NodeRepository::class)
            )
        );


        $this->app->bind(
            ServiceFormProcessor::class,
             function () {
                 $formProcessor = new ServiceFormProcessor(
                     $this->app->make(ServiceValidator::class),
                     $this->app->make(ServicesRepository::class)
                 );
                 $formProcessor->addSubProcessor(\App(Competencies::class));
                 $formProcessor->addSubProcessor(\App(Tasks::class));
                 $formProcessor->addSubProcessor(\App(Tabs::class));
                 $formProcessor->addSubProcessor(\App(FaqQuestions::class));
                 $formProcessor->addSubProcessor(\App(BeforeAfterImages::class));
                 $formProcessor->addSubProcessor(\App(\App\Services\FormProcessors\Service\SubProcessor\ContentBlocks::class));
                 return $formProcessor;
             }
        );


        $this->app->bind(
            ReviewFormProcessor::class,
            function () {
                $formProcessor = new ReviewFormProcessor(
                    $this->app->make(ReviewValidator::class),
                    $this->app->make(ReviewRepository::class)
                );
                //$formProcessor->addSubProcessor(\App(\App\Services\FormProcessors\Review\SubProcessor\Images::class));
                $formProcessor->addSubProcessor(\App(\App\Services\FormProcessors\Review\SubProcessor\Services::class));
                return $formProcessor;
            }
        );

        $this->app->bind(
            OfferFormProcessor::class,
            fn() => new OfferFormProcessor(
                $this->app->make(OfferValidator::class),
                $this->app->make(OfferRepository::class)
            )
        );


        $this->app->bind(
            OurWorkFormProcessor::class,
            function () {
                $formProcessor = new OurWorkFormProcessor(
                    $this->app->make(OurWorkValidator::class),
                    $this->app->make(OurWorkRepository::class)
                );
                $formProcessor->addSubProcessor(\App(\App\Services\FormProcessors\OurWork\SubProcessor\Images::class));
                $formProcessor->addSubProcessor(\App(\App\Services\FormProcessors\OurWork\SubProcessor\Services::class));
                return $formProcessor;
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


        $this->app->bind(
            TargetAudienceFormProcessor::class,
            fn() => new TargetAudienceFormProcessor(
                $this->app->make(TargetAudienceValidator::class),
                $this->app->make(\App\Services\Repositories\TargetAudience\TargetAudienceRepository::class)
            )
        );

    }
}
