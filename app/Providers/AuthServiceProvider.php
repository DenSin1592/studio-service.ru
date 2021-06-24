<?php

namespace App\Providers;

use App\Services\Auth\AdminUserProvider;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        \Auth::provider(
            'admin_user',
            fn(Application $app, array $config) => new AdminUserProvider($app['hash'], $config['model'], $config['skip_env'])
        );
    }
}
