<?php

namespace App\Providers;

use App\Services\Composers\AdminAlertComposer;
use App\Services\Composers\ClientBottomMenuComposer;
use App\Services\Composers\ClientTopMenuComposer;
use App\Services\Composers\CurrentAdminUserComposer;
use Illuminate\Support\ServiceProvider;
use App\Services\Composers\AdminMainMenuComposer;

class ComposersServiceProvider extends ServiceProvider
{

    public function register()
    {
        \View::composers([
            // Admin composers
            AdminAlertComposer::class => 'admin.layouts._alerts',
            CurrentAdminUserComposer::class => [
                'admin.layouts._top_nav',
                'client.layouts._auth_menu',
            ],
            AdminMainMenuComposer::class => 'admin.layouts._main_menu',
            ClientTopMenuComposer::class => 'client.layouts._header',
            ClientBottomMenuComposer::class => 'client.layouts._footer',

        ]);
    }
}
