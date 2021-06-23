<?php namespace App\Providers;

use App\Services\Repositories\Node\EloquentNodeRepository;
use App\Services\Repositories\TargetAudienceRepository\EloquentTargetAudienceRepository;
use App\Services\RepositoryFeatures\Order\OrderScopesInterface;
use App\Services\RepositoryFeatures\Order\PositionOrderScopes;
use App\Services\RepositoryFeatures\Tree\PublishedTreeBuilder;
use App\Services\RepositoryFeatures\Tree\TreeBuilder;
use App\Services\RepositoryFeatures\Tree\TreeBuilderInterface;
use Illuminate\Support\ServiceProvider;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(EloquentNodeRepository::class)->needs(OrderScopesInterface::class)->give(function () {
            return new PositionOrderScopes();
        });
        $this->app->when(EloquentNodeRepository::class)->needs(TreeBuilderInterface::class)->give(function () {
            return new PublishedTreeBuilder(new PositionOrderScopes());
        });

        $this->app->when(EloquentTargetAudienceRepository::class)->needs(OrderScopesInterface::class)->give(function () {
            return new PositionOrderScopes();
        });
        $this->app->when(EloquentTargetAudienceRepository::class)->needs(TreeBuilderInterface::class)->give(function () {
            return new PublishedTreeBuilder(new PositionOrderScopes());
        });
    }
}
