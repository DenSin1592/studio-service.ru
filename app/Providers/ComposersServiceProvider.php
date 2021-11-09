<?php

namespace App\Providers;

use App\Services\Composers\AdminAlertComposer;
use App\Services\Composers\ClientTopMenuComposer;
use App\Services\Composers\CurrentAdminUserComposer;
use App\Services\Repositories\Node\NodeRepository;
use Illuminate\Support\ServiceProvider;
use App\Services\Composers\AdminMainMenuComposer;


class ComposersServiceProvider extends ServiceProvider
{

    public function register()
    {

        $this->app->singleton(ClientTopMenuComposer::class, fn() => new ClientTopMenuComposer(new NodeRepository()));


        \View::composers([
            // Admin composers
            AdminAlertComposer::class => 'admin.layouts._alerts',
            AdminMainMenuComposer::class => 'admin.layouts._main_menu',
            CurrentAdminUserComposer::class => [
                'admin.layouts._top_nav',
                'client.layouts._auth_menu',
            ],


            ClientTopMenuComposer::class => [
                'client.layouts._header',
                'client.layouts._offcanvas'
            ],
            //ClientBottomMenuComposer::class => 'client.layouts._footer',
        ]);
    }
}
