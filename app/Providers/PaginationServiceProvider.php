<?php namespace App\Providers;

use App\Services\Pagination\FlexPaginator;
use Illuminate\Support\ServiceProvider;

class PaginationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->when(FlexPaginator::class)
            ->needs('$availableLimits')
            ->give(function () {
                return $this->app->make('flex-paginator.available_limits');
            });

        $this->app->bind('flex-paginator.available_limits', fn () => FlexPaginator::COUNT_ELEMENTS_ON_PAGE_VARIANTS);
    }
}
