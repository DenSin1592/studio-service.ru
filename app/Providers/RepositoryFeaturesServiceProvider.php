<?php

namespace App\Providers;

use App\Services\RepositoryFeatures\Order\OrderScopesInterface;
use App\Services\RepositoryFeatures\Order\PositionOrderScopes;
use App\Services\RepositoryFeatures\Tree\PublishedTreeBuilder;
use App\Services\RepositoryFeatures\Tree\TreeBuilderInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryFeaturesServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(OrderScopesInterface::class, fn() => new PositionOrderScopes());

        $this->app->bind(TreeBuilderInterface::class, fn() => new PublishedTreeBuilder(\App(OrderScopesInterface::class)));

    }
}
