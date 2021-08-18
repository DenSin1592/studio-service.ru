<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Последующие языковые строки содержат сообщения по-умолчанию, используемые
    | классом, проверяющим значения (валидатором). Некоторые из правил имеют
    | несколько версий, например, size. Вы можете поменять их на любые
    | другие, которые лучше подходят для вашего приложения.
    |
    */

    'accepted' => 'Вы должны принять :attribute.',
    'active_url' => 'Поле :attribute содержит недействительный URL.',
    'after' => 'В поле :attribute должна быть дата после :date.',
    'after_or_equal' => 'В поле :attribute должна быть дата после или равняться :date.',
    'alpha' => 'Поле :attribute может содержать только буквы.',
    'alpha_dash' => 'Поле :attribute может содержать только буквы, цифры, дефис и нижнее подчеркивание.',
    'alpha_num' => 'Поле :attribute может содержать только буквы и цифры.',
    'array' => 'Поле :attribute должно быть массивом.',
    'before' => 'В поле :attribute должна быть дата до :date.',
    'before_or_equal' => 'В поле :attribute должна быть дата до или равняться :date.',
    'between' => [
        'numeric' => 'Поле :attribute должно быть между :min и :max.',
        'file' => 'Размер файла в поле :attribute должен быть между :min и :max Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть между :min и :max.',
        'array' => 'Количество элементов в поле :attribute должно быть между :min и :max.',
    ],
    'boolean' => 'Поле :attribute должно иметь значение логического типа.',
    'confirmed' => 'Поле :attribute не совпадает с подтверждением.',
    'date' => 'Поле :attribute не является датой.',
    'date_equals' => 'Поле :attribute должно быть датой равной :date.',
    'date_format' => 'Поле :attribute не соответствует формату :format.',
    'different' => 'Поля :attribute и :other должны различаться.',
    'digits' => 'Длина цифрового поля :attribute должна быть :digits.',
    'digits_between' => 'Длина цифрового поля :attribute должна быть между :min и :max.',
    'dimensions' => 'Поле :attribute имеет недопустимые размеры изображения.',
    'distinct' => 'Поле :attribute содержит повторяющееся значение.',
    'email' => 'Поле :attribute должно быть действительным электронным адресом.',
    'ends_with' => 'Поле :attribute должно заканчиваться одним из следующих значений: :values',
    'exists' => 'Выбранное значение для :attribute некорректно.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле :attribute обязательно для заполнения.',
    'gt' => [
        'numeric' => 'Поле :attribute должно быть больше :value.',
        'file' => 'Размер файла в поле :attribute должен быть больше :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть больше :value.',
        'array' => 'Количество элементов в поле :attribute должно быть больше :value.',
    ],
    'gte' => [
        'numeric' => 'Поле :attribute должно быть больше или равно :value.',
        'file' => 'Размер файла в поле :attribute должен быть больше или равен :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть больше или равно :value.',
        'array' => 'Количество элементов в поле :attribute должно быть больше или равно :value.',
    ],
    'image' => 'Поле :attribute должно быть изображением.',
    'in' => 'Выбранное значение для :attribute ошибочно.',
    'in_array' => 'Поле :attribute не существует в :other.',
    'integer' => 'Поле :attribute должно быть целым числом.',
    'ip' => 'Поле :attribute должно быть действительным IP-адресом.',
    'ipv4' => 'Поле :attribute должно быть действительным IPv4-адресом.',
    'ipv6' => 'Поле :attribute должно быть действительным IPv6-адресом.',
    'json' => 'Поле :attribute должно быть JSON строкой.',
    'lt' => [
        'numeric' => 'Поле :attribute должно быть меньше :value.',
        'file' => 'Размер файла в поле :attribute должен быть меньше :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть меньше :value.',
        'array' => 'Количество элементов в поле :attribute должно быть меньше :value.',
    ],
    'lte' => [
        'numeric' => 'Поле :attribute должно быть меньше или равно :value.',
        'file' => 'Размер файла в поле :attribute должен быть меньше или равен :value Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть меньше или равно :value.',
        'array' => 'Количество элементов в поле :attribute должно быть меньше или равно :value.',
    ],
    'max' => [
        'numeric' => 'Поле :attribute не может быть более :max.',
        'file' => 'Размер файла в поле :attribute не может быть более :max Килобайт(а).',
        'string' => 'Количество символов в поле :attribute не может превышать :max.',
        'array' => 'Количество элементов в поле :attribute не может превышать :max.',
    ],
    'mimes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'mimetypes' => 'Поле :attribute должно быть файлом одного из следующих типов: :values.',
    'min' => [
        'numeric' => 'Поле :attribute должно быть не менее :min.',
        'file' => 'Размер файла в поле :attribute должен быть не менее :min Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть не менее :min.',
        'array' => 'Количество элементов в поле :attribute должно быть не менее :min.',
    ],
    'not_in' => 'Выбранное значение для :attribute ошибочно.',
    'not_regex' => 'Выбранный формат для :attribute ошибочный.',
    'numeric' => 'Поле :attribute должно быть числом.',
    'present' => 'Поле :attribute должно присутствовать.',
    'regex' => 'Поле :attribute имеет ошибочный формат.',
    'required' => 'Поле :attribute обязательно для заполнения.',
    'required_if' => 'Поле :attribute обязательно для заполнения, когда :other равно :value.',
    'required_unless' => 'Поле :attribute обязательно для заполнения, когда :other не равно :values.',
    'required_with' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_with_all' => 'Поле :attribute обязательно для заполнения, когда :values указано.',
    'required_without' => 'Поле :attribute обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле :attribute обязательно для заполнения, когда ни одно из :values не указано.',
    'same' => 'Значения полей :attribute и :other должны совпадать.',
    'size' => [
        'numeric' => 'Поле :attribute должно быть равным :size.',
        'file' => 'Размер файла в поле :attribute должен быть равен :size Килобайт(а).',
        'string' => 'Количество символов в поле :attribute должно быть равным :size.',
        'array' => 'Количество элементов в поле :attribute должно быть равным :size.',
    ],
    'starts_with' => 'Поле :attribute должно начинаться из одного из следующих значений: :values',
    'string' => 'Поле :attribute должно быть строкой.',
    'timezone' => 'Поле :attribute должно быть действительным часовым поясом.',
    'unique' => 'Такое значение поля :attribute уже существует.',
    'uploaded' => 'Загрузка поля :attribute не удалась.',
    'url' => 'Поле :attribute имеет ошибочный формат.',
    'uuid' => 'Поле :attribute должно быть корректным UUID.',

    // Custom validation messages
    'subset' => 'Поле :attribute должно содержать значения из множества: :variants.',
    'multi_key_exists' => 'Поле :attribute содержит некорректные значения',
    'multi_exists' => 'Поле :attribute содержит некорректные значения',
    'phone' => 'Поле :attribute должно содержать корректный телефонный номер. Пример: +7 (777) 777-77-77.',
    "email_list" => "Поле :attribute должно содержать список корректных e-mail адресов.",
    'more_than' => 'Поле :attribute должно быть больше :value.',
    'unique_among' => 'Поле :attribute должно быть уникальным.',
    'regular_expression' => 'Поле :attribute содержит некорректное регулярное выражение.',
    'type_parent_key' => 'Поле :attribute содержит некорректное значение.',

    /*
    |--------------------------------------------------------------------------
    | Собственные языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Здесь Вы можете указать собственные сообщения для атрибутов.
    | Это позволяет легко указать свое сообщение для заданного правила атрибута.
    |
    | http://laravel.com/docs/validation#custom-error-messages
    | Пример использования
    |
    |   'custom' => [
    |       'email' => [
    |           'required' => 'Нам необходимо знать Ваш электронный адрес!',
    |       ],
    |   ],
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Собственные названия атрибутов
    |--------------------------------------------------------------------------
    |
    | Последующие строки используются для подмены программных имен элементов
    | пользовательского интерфейса на удобочитаемые. Например, вместо имени
    | поля "email" в сообщениях будет выводиться "электронный адрес".
    |
    */

    'attributes' => [
        'created_at' => 'Дата создания',
        'updated_at' => 'Дата редактирования',

        'id' => 'Номер',
        'name' => 'Название',
        'header' => 'Заголовок',
        'description' => 'Описание',
        'content_before_slider' => 'Контент до слайдера',
        'content_after_slider' => 'Контент после слайдера',
        'sub_header' => 'Подзаголовок',
        'meta_title' => 'Meta title',
        'meta_description' => 'Meta description',
        'meta_keywords' => 'Meta keywords',
        'status' => 'Статус',
        'phone' => 'Телефон',

        'username' => 'Имя пользователя',
        'password' => 'Пароль',
        'new_password' => 'Новый пароль',
        'password_confirmation' => 'Подтверждение пароля',
        'allowed_ips' => 'Разрешённые IP адреса',
        'active' => 'Активность',
        'image_file' => 'Изображение',
        'image_before_file' => 'Изображение \'До\'',
        'image_after_file' => 'Изображение \'После\'',
        'header_block_background_image_file' => 'Фон для блока',
        'image_right_from_header_file' => 'Изображение справа от заголовка',
        'achievements_block' => 'Блок с преимуществами',

        'position' => 'Позиция',
        'publish' => 'Публикация',
        'image_right' => 'Изображение справа',
        'menu_top' => 'В верхнем меню',
        'menu_bottom' => 'В нижнем меню',
        'alias' => 'Псевдоним URL',
        'parent_id' => 'Родитель',
        'parent_key' => 'Родитель',
        'type' => 'Тип',
        'top_content' => 'Содержимое вверху',
        'content' => 'Содержимое',
        'content_top' => 'Содержимое сверху',
        'content_bottom' => 'Содержимое снизу',
        'short_content' => 'Краткое содержимое',
        'bottom_content' => 'Содержимое внизу',
        'import_description' => 'Описание, полученное при импорте',
        'admin_description' => 'Описание от администратора',
        'sorting' => 'Сортировка',
        'url' => 'Ссылка',
        'icon_file' => 'Иконка',
        'preview_image_file' => 'Изображение для превью',
        'background_image_file' => 'Изображение фона',
        'section_tasks_publish' => 'Публикация',
        'section_tasks_name' => 'Заголовок',
        'section_video_name' => 'Текст ссылки',
        'section_video_link_youtube' => 'Ссылка Youtube',
        'section_video_publish' => 'Публикация',
        'section_video_image_file' => 'Изображение',
        'section_tabs_name' => 'Заголовок',
        'section_tabs_description' => 'Описание',
        'section_tabs_publish' => 'Публикация',
        'tab_name' => 'Название',
        'section_requirements_name' => 'Заголовок',
        'section_requirements_content' => 'Контент',
        'section_requirements_publish' => 'Публикация',
        'section_faq_name' => 'Заголовок',
        'section_faq_publish' => 'Публикация',
        'section_prices_name' => 'Заголовок',
        'section_prices_content' => 'Контент',
        'section_prices_publish' => 'Публикация',
        'section_advantages_content' => 'Контент',
        'section_advantages_publish' => 'Публикация',

        'section_feedback_name' => 'Заголовок',
        'section_feedback_publish' => 'Публикация',
        'section_competencies_name' => 'Заголовок',
        'section_competencies_publish' => 'Публикация',

        'section_services_name' => 'Заголовок',
        'section_services_publish' => 'Публикация',
        'section_target_audiences_name' => 'Заголовок',
        'section_target_audiences_publish' => 'Публикация',
        'section_reviews_publish' => 'Публикация блока \'Отзывы\'',
        'section_projects_publish' => 'Публикация блока \'Проекты\'',

        'device_type' => 'Тип устройства',
        'user_agent' => 'Заголовок браузера',

        'admin_role_id' => 'Роль',
        'abilities' => 'Возможности',
        'creator' => 'Создатель',
        'seo' => 'SEO',

        'review_id' => 'id',
        'review_name' => 'Имя клиента',
        'review_content' => 'Текст отзыва',
        'review_answer' => 'Ответ на отзыв',
        'review_score' => 'Оценка',
        'review_date' => 'Дата отзыва',
        'on_home_page' => 'На главной',
        'email' => 'Email',
        'black_header_preview' => 'Чёрный заголовок на превью (по умолчанию заголовок белый)(подходит для белых картинок)',

        'our_works_preview' => 'Превью',
        'our_works_description' => "Описание",

        'title' => "Название",
        'text' => "Текст",

        'block_advantages' => "Блок \"Наши примущества\"",
        'youtube_link' => "Ссылка Youtube",
        'youtube_link_about' => "Ссылка Youtube - \"Видео о нас\"",
        'short_about' => "Текст \"Коротко о нас\"",
        'description_after_header' => "Описание после заголовка",
        'link_about' => "Cсылка \"Подробнее о нас\"",

        'service' => "Услуга",
        'TA' => "ЦА",
        'admin_comment' => 'Коментарий администратора',

    ],

    'model_values' => [
        'feedback' => [
            'status' => [
                \App\Models\Feedback::STATUS_NEW => 'Новая',
                \App\Models\Feedback::STATUS_IN_PROGRESS => 'В обработке',
                \App\Models\Feedback::STATUS_CLOSED => 'Закрыта',
            ],
            'referral_url' => 'Страница отправки заявки',
        ],
        'device_type' => [
            \App\Helpers\Device::TYPE_DESKTOP => 'компьютер',
            \App\Helpers\Device::TYPE_MOBILE => 'телефон',
            \App\Helpers\Device::TYPE_TABLET => 'планшет',
        ],
    ],
];
