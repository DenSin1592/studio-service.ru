<?php

namespace App\Providers;

use App\Services\Repositories\AdminRole\AdminRoleRepository;
use App\Services\Repositories\AdminUser\AdminUserRepository;
use App\Services\Repositories\BeforeAfterImages\BeforeAfterImagesRepository;
use App\Services\Repositories\Competencies\CompetenceContentBlock\CompetenceContentBlockRepository;
use App\Services\Repositories\Competencies\CompetenciesRepository;
use App\Services\Repositories\Feedback\FeedbackRepository;
use App\Services\Repositories\Node\NodeRepository;
use App\Services\Repositories\Offer\OfferContentBlock\OfferContentBlockRepository;
use App\Services\Repositories\Offer\OfferRepository;
use App\Services\Repositories\Offer\OfferTab\OfferTabRepository;
use App\Services\Repositories\OurWork\OurWorkImage\OurWorkImageRepository;
use App\Services\Repositories\OurWork\OurWorkRepository;
use App\Services\Repositories\Pages\CompetencePage\CompetencePageRepository;
use App\Services\Repositories\Pages\HomePage\HomePageRepository;
use App\Services\Repositories\Pages\OurWorkPage\OurWorkPageRepository;
use App\Services\Repositories\Pages\ReviewPage\ReviewPageRepository;
use App\Services\Repositories\Pages\ServicePage\ServicePageRepository;
use App\Services\Repositories\Pages\TargetAudiencePage\TargetAudiencePageRepository;
use App\Services\Repositories\Pages\TextPage\TextPageRepository;
use App\Services\Repositories\Review\ReviewImage\ReviewImageRepository;
use App\Services\Repositories\Review\ReviewRepository;
use App\Services\Repositories\Services\ServiceContentBlock\ServiceContentBlockRepository;
use App\Services\Repositories\Services\ServiceFaqQuestion\ServiceFaqQuestionRepository;
use App\Services\Repositories\Services\ServicesRepository;
use App\Services\Repositories\Services\ServiceTab\ServiceTabRepository;
use App\Services\Repositories\Setting\SettingRepository;
use App\Services\Repositories\Services\ServiceTask\ServiceTaskRepository;
use App\Services\Repositories\TargetAudience\TargetAudienceRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    public function register()
    {

        $this->app->singleton(
            AdminRoleRepository::class,
            fn() => new AdminRoleRepository()
        );


        $this->app->singleton(
            AdminUserRepository::class,
            fn() => new AdminUserRepository()
        );


        $this->app->singleton(
            BeforeAfterImagesRepository::class,
            fn() => new BeforeAfterImagesRepository()
        );


        $this->app->singleton(
            CompetenciesRepository::class,
            fn() => new CompetenciesRepository()
        );


        $this->app->singleton(
            CompetenceContentBlockRepository::class,
            fn() => new CompetenceContentBlockRepository()
        );


        $this->app->singleton(
            FeedbackRepository::class,
            fn() => new FeedbackRepository()
        );


        $this->app->singleton(
            NodeRepository::class,
            fn() => new NodeRepository()
        );


        $this->app->singleton(
            ReviewRepository::class,
            fn() => new ReviewRepository()
        );


        $this->app->singleton(
            ReviewImageRepository::class,
            fn() => new ReviewImageRepository()
        );


        $this->app->singleton(
            OfferRepository::class,
            fn() => new OfferRepository()
        );

        $this->app->singleton(
            OfferContentBlockRepository::class,
            fn() => new OfferContentBlockRepository()
        );

        $this->app->singleton(
            OfferTabRepository::class,
            fn() => new OfferTabRepository()
        );

        $this->app->singleton(
            OurWorkRepository::class,
            fn() => new OurWorkRepository()
        );


        $this->app->singleton(
            OurWorkImageRepository::class,
            fn() => new OurWorkImageRepository()
        );


        $this->app->singleton(
            ServicesRepository::class,
            fn() => new ServicesRepository()
        );

        $this->app->singleton(
            ServiceTaskRepository::class,
            fn() => new ServiceTaskRepository()
        );

        $this->app->singleton(
            ServiceTabRepository::class,
            fn() => new ServiceTabRepository()
        );

        $this->app->singleton(
            ServiceContentBlockRepository::class,
            fn() => new ServiceContentBlockRepository()
        );

        $this->app->singleton(
            ServiceFaqQuestionRepository::class,
            fn() => new ServiceFaqQuestionRepository()
        );

        $this->app->singleton(
            SettingRepository::class,
            fn() => new SettingRepository()
        );

        $this->app->singleton(
            TargetAudienceRepository::class,
            fn() => new TargetAudienceRepository()
        );


        (function(){

            $this->app->singleton(
                TargetAudiencePageRepository::class,
                fn() => new TargetAudiencePageRepository()
            );

            $this->app->singleton(
                HomePageRepository::class,
                fn() => new HomePageRepository()
            );

            $this->app->singleton(
                ServicePageRepository::class,
                fn() => new ServicePageRepository()
            );

            $this->app->singleton(
                ReviewPageRepository::class,
                fn() => new ReviewPageRepository()
            );

            $this->app->singleton(
                CompetencePageRepository::class,
                fn() => new CompetencePageRepository()
            );

            $this->app->singleton(
                OurWorkPageRepository::class,
                fn() => new OurWorkPageRepository()
            );

            $this->app->singleton(
                TextPageRepository::class,
                fn() => new TextPageRepository()
            );

        })();

    }
}
