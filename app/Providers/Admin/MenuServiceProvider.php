<?php namespace App\Providers\Admin;

use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\HomePagesController;
use App\Http\Controllers\Admin\ProjectsController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\StructureController;
use App\Http\Controllers\Admin\TextPagesController;
use App\Services\Admin\Menu\Menu;
use App\Services\Admin\Menu\MenuElement;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            'admin.main_menu',
            function () {
                $menu = new Menu();

                $menu->addMenuElement(
                    new MenuElement(
                        'Структура сайта',
                        'glyphicon-th-list',
                        route('cc.structure.index'),
                        [
                            StructureController::class,
                            //HomePagesController::class,
                            //TextPagesController::class,
                        ]
                    )
                );

                /*$menu->addMenuElement(
                    new MenuElement(
                        'Константы',
                        'glyphicon-copyright-mark',
                        route('cc.settings.edit'),
                        [SettingsController::class]
                    )
                );*/

                return $menu;
            });
    }
}
