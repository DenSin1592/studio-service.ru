<?php

namespace App\Providers\Admin;

use App\Http\Controllers\Admin\AdminRolesController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\Admin\EssenceControllers\BeforeAfterImagesController;
use App\Http\Controllers\Admin\EssenceControllers\CompetenciesController;
use App\Http\Controllers\Admin\EssenceControllers\FeedbackController;
use App\Http\Controllers\Admin\EssenceControllers\OffersController;
use App\Http\Controllers\Admin\EssenceControllers\OurWorksController;
use App\Http\Controllers\Admin\EssenceControllers\StructureController;
use App\Http\Controllers\Admin\EssenceControllers\TargetAudiencesController;
use App\Http\Controllers\Admin\PageControllers\HomePageController;
use App\Http\Controllers\Admin\EssenceControllers\ReviewsController;
use App\Http\Controllers\Admin\EssenceControllers\ServicesController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\PageControllers\TargetAudiencePageController;
use App\Services\Admin\Menu\Menu;
use App\Services\Admin\Menu\MenuElement;
use App\Services\Admin\Menu\MenuGroup;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            Menu::class,
            function () {
                $menu = new Menu($this->app['acl']);

                $menu->addMenuElement(
                    new MenuElement(
                        'Структура сайта',
                        'glyphicon-th-list',
                        route('cc.structure.index'),
                        [
                            StructureController::class,
                            HomePageController::class,
                            TargetAudiencePageController::class,
                        ]
                    )
                );


                $groupCatalogs = new MenuGroup('Каталоги', 'glyphicon-book');
                $menu->addMenuGroup($groupCatalogs);
                $groupCatalogs->addMenuElement(
                    new MenuElement(
                        'Каталог',
                        'glyphicon-list-alt',
                        route(CompetenciesController::ROUTE_INDEX),
                        [CompetenciesController::class]
                    )
                );
                $groupCatalogs->addMenuElement(
                    new MenuElement(
                        'Услуги',
                        'glyphicon-ok',
                        route(ServicesController::ROUTE_INDEX),
                        [ServicesController::class]
                    )
                );
                $groupCatalogs->addMenuElement(
                    new MenuElement(
                        'Целевые аудитории',
                        'glyphicon-user',
                        route(TargetAudiencesController::ROUTE_INDEX),
                        [TargetAudiencesController::class]
                    )
                );
                $groupCatalogs->addMenuElement(
                    new MenuElement(
                        'Решения',
                        'glyphicon-usd',
                        route(OffersController::ROUTE_INDEX),
                        [OffersController::class]
                    )
                );


                $groupReferenceBooks = new MenuGroup('Справочники', 'glyphicon-folder-open');
                $menu->addMenuGroup($groupReferenceBooks);
                $groupReferenceBooks->addMenuElement(
                    new MenuElement(
                        'Изображения \'До/После\'',
                        'glyphicon-picture',
                        route(BeforeAfterImagesController::ROUTE_INDEX),
                        [BeforeAfterImagesController::class]
                    )
                );


                $menu->addMenuElement(
                    new MenuElement(
                        'Обратная связь',
                        'glyphicon-envelope',
                        route(FeedbackController::ROUTE_INDEX),
                        [FeedbackController::class]
                    )
                );


                $menu->addMenuElement(
                    new MenuElement(
                        'Отзывы',
                        'glyphicon-comment',
                        route(ReviewsController::ROUTE_INDEX),
                        [ReviewsController::class]
                    )
                );


                $menu->addMenuElement(
                    new MenuElement(
                        'Проекты',
                        'glyphicon-briefcase',
                        route(OurWorksController::ROUTE_INDEX),
                        [OurWorksController::class]
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
