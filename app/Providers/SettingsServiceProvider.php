<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Settings\SettingContainer;
use App\Services\Settings\SettingGroup;
use App\Services\Settings\SettingValue;
use App\Services\Settings\SettingGetter;

class SettingsServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton(
            SettingContainer::class,
            function () {
                $settingContainer = new SettingContainer;

                $general = new SettingGroup('Основные');
                $settingContainer->addSettingGroup($general);

                $general->addSettingValue(
                    new SettingValue(
                        'general.site_name',
                        'Название сайта',
                        'studio-service.ru',
                        'Используется в политике конфиденциальности, окне авторизации системы администрирования и т.д.',
                        SettingValue::TYPE_TEXT
                    )
                );

                $general->addSettingValue(
                    new SettingValue(
                        'general.company_name',
                        'Название компании',
                        'OOO "СТУДИЯ-СЕРВИС',
                        'Используется в политике конфиденциальности.',
                        SettingValue::TYPE_TEXT
                    )
                );

                $notifications = new SettingGroup('Уведомления');
                $settingContainer->addSettingGroup($notifications);

                $notifications->addSettingValue(
                    new SettingValue(
                        'mail.feedback.address',
                        'Email обратной связи (кому)',
                        'msk@studio-service.ru',
                        'Адрес выводится также в футере и шапке',
                        SettingValue::TYPE_TEXT,
                        ['required', 'email']
                    )
                );

                /*$notifications->addSettingValue(
                    new SettingValue(
                        'mail.from.address',
                        'Е-mail отправителя (от кого)',
                        '',
                        str_replace(
                            '{app.name}',
                            \Config::get('app.name'),
                            'Если поле не заполнено, то используется почта <i>noreply@{app.name}</i>'
                        ),
                        SettingValue::TYPE_TEXT,
                        ['nullable', 'email']
                    )
                );*/

                /*$notifications->addSettingValue(
                    new SettingValue(
                        'mail.from.name',
                        'Имя отправителя (от кого)',
                        '',
                        str_replace(
                            '{app.name}',
                            \Config::get('app.name'),
                            'Если поле не заполнено, то используется <i>{app.name}</i>'
                        ),
                        SettingValue::TYPE_TEXT,
                        ['nullable']
                    )
                );*/

                /*$notifications->addSettingValue(
                    new SettingValue(
                        'mail.reply_to.address',
                        'Адрес для ответа в письмах посетителям сайта',
                        '',
                        'Если пользователь нажмет на кнопку "Ответить на письмо", то ответ будет отправлен на этот адрес',
                        SettingValue::TYPE_TEXT,
                        ['nullable', 'email']
                    )
                );*/

               /* $notifications->addSettingValue(
                    new SettingValue(
                        'mail.for_display.address',
                        'Email для отображения на сайте и в футере писем',
                        'diol-test@yandex.ru',
                        '',
                        SettingValue::TYPE_TEXT,
                        ['required', 'email']
                    )
                );*/


                $siteContent = new SettingGroup('Содержимое сайта');
                $settingContainer->addSettingGroup($siteContent);

                $siteContent->addSettingValue(
                    new SettingValue(
                        'site_content.phone',
                        'Номер телефона',
                        '+74959333439',
                        '',
                        SettingValue::TYPE_TEXT
                    )
                );

                $admin = new SettingGroup('Система администрирования');
                $settingContainer->addSettingGroup($admin);

                $admin->addSettingValue(
                    new SettingValue(
                        'admin.field_descriptions',
                        'Описания полей',
                        '',
                        '<div style="text-align: left; display: inline-block;">
                        <strong>Пример</strong>:<br />
                        <strong>Название:</strong> "описание названия"<br />
                        <strong>"Краткое содержимое":</strong> "Описание краткого содержимого"
                        </div>',
                        SettingValue::TYPE_TEXTAREA,
                        ['nullable']
                    )
                );

                return $settingContainer;
            }
        );

        $this->app->singleton('setting', fn () => $this->app->make(SettingGetter::class));

    }
}
