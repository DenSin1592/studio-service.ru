<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Blind Copy "To" Address
    |--------------------------------------------------------------------------
    |
    | Message also will be sent on this address for defined environments.
    |
    */

    'bcc' => [
        'address' => env('MAIL_BLIND_COPY_ADDRESS', [
            'diol.test@gmail.com',
            'diol-test@yandex.ru',
            'diol-test@mail.ru',
            'diol-test@lenta.ru'
        ]),
        'environments' => ['production'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Substituted "To" Address
    |--------------------------------------------------------------------------
    |
    | All messages will be sent on this address for defined environments.
    |
    */

    'substituted_to' => [
        'address' => env('MAIL_SUBSTITUTED_TO_ADDRESS', 'diol-test@yandex.ru'),
        'environments' => ['local'], // recipient will be substitute for environments.
    ],
];
