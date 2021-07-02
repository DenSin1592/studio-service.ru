<?php

return [
    'alert_mail' => [
        'address' => env('MAIL_ALERT_ADDRESS', [
            'alex@diol-it.ru',
            'diol.tech.info@gmail.com',
            'diol.test@gmail.com',
            'diol-test@yandex.ru',
            'diol-test@mail.ru',
            'diol-test@lenta.ru',
        ]),
        'subject' => 'Критическая ошибка на сайте ' . request()->root(),
        'sending_interval' => 60,
    ],
    'dump_file_name' => 'exception-dump',
];
