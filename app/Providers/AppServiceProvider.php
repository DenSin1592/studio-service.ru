<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\OfferTab;
use App\Models\ServiceTab;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, 'ru_RU.UTF-8');
        Carbon::setLocale(config('app.locale'));

        Paginator::defaultView('pagination::bootstrap-4');
        //Paginator::defaultSimpleView('view-name');

        Relation::morphMap([
            'service_tab' => ServiceTab::class,
            'offer_tab' => OfferTab::class,
        ]);
    }
}
