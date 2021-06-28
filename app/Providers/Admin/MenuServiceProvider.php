<?php

namespace App\Providers\Admin;

use App\Http\Controllers\Admin\AdminRolesController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\HomePagesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\StructureController;
use App\Http\Controllers\Admin\TargetAudiencePagesController;
use App\Http\Controllers\Admin\TargetAudiencesController;
use App\Services\Admin\Menu\Menu;
use App\Services\Admin\Menu\MenuElement;
use App\Services\Admin\Menu\MenuGroup;
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
                            HomePagesController::class,
                            TargetAudiencePagesController::class,
                        ]
                    )
                );

                $groupCatalogs = new MenuGroup('Каталоги', 'glyphicon-book');
                $menu->addMenuGroup($groupCatalogs);
                $groupCatalogs->addMenuElement(
                    new MenuElement(
                        'ЦА',
                        'glyphicon-user',
                        route(TargetAudiencesController::ROUTE_INDEX),
                        [TargetAudiencesController::class]
                    )
                );

                $menu->addMenuElement(
                    new MenuElement(
                        'Константы',
                        'glyphicon-copyright-mark',
                        route('cc.settings.edit'),
                        [SettingsController::class]
                    )
                );

                $groupPermissions = new MenuGroup('Управление доступом', 'glyphicon-tower');
                $menu->addMenuGroup($groupPermissions);
                $groupPermissions->addMenuElement(
                    new MenuElement(
                        'Администраторы',
                        'glyphicon-user',
                        route('cc.admin-users.index'),
                        [AdminUsersController::class]
                    )
                );

                $groupPermissions->addMenuElement(
                    new MenuElement(
                        'Роли администраторов',
                        'glyphicon-check',
                        route('cc.admin-roles.index'),
                        [AdminRolesController::class]
                    )
                );


                $groupTech = new MenuGroup('Техническая информация', 'glyphicon-wrench');
                $menu->addMenuGroup($groupTech);
                $groupTech->addMenuElement(new MenuElement(
                    'Логи (Telescope)',
                    'glyphicon-calendar',
                    url('telescope'),
                    [],
                    true
                ));


                return $menu;
            });
    }
}
