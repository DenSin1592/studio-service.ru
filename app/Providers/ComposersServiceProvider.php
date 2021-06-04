<?php namespace App\Providers;

use App\Services\Composers\AdminAlertComposer;
use App\Services\Composers\ClientPagesInBottomMenuComposer;
use App\Services\Composers\ClientPagesInTopMenuComposer;
use App\Services\Composers\ClientPhoneComposer;
use App\Services\Composers\CurrentAdminUserComposer;
use Illuminate\Support\ServiceProvider;
use App\Services\Composers\AdminMainMenuComposer;

class ComposersServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        \View::composers([

            // Admin composers
            AdminAlertComposer::class => 'admin.layouts._alerts',
            CurrentAdminUserComposer::class => [
                'admin.layouts._top_nav',
                'client.layouts._auth_menu',
            ],
            //todo: Сделать этот композер
            //AdminMainMenuComposer::class => 'admin.layouts._main_menu',
        ]);
    }
}
