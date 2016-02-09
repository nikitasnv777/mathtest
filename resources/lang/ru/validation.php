<?php
return [
    /*
    |--------------------------------------------------------------------------
    | Языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Последующие языковые строки содержат сообщения по-умолчанию, используемые
    | классом, проверяющим значения (валидатором).Некоторые из правил имеют
    | несколько версий, например, size. Вы можете поменять их на любые
    | другие, которые лучше подходят для вашего приложения.
    |
    */
    'accepted'             => 'Вы должны принять &ldquo;:attribute&rdquo;.',
    'active_url'           => 'Поле &ldquo;:attribute&rdquo; содержит недействительный URL.',
    'after'                => 'В поле &ldquo;:attribute&rdquo; должна быть дата после :date.',
    'alpha'                => 'Поле &ldquo;:attribute&rdquo; может содержать только буквы.',
    'alpha_dash'           => 'Поле &ldquo;:attribute&rdquo; может содержать только буквы, цифры и дефис.',
    'alpha_num'            => 'Поле &ldquo;:attribute&rdquo; может содержать только буквы и цифры.',
    'array'                => 'Поле &ldquo;:attribute&rdquo; должно быть массивом.',
    'before'               => 'В поле &ldquo;:attribute&rdquo; должна быть дата до :date.',
    'between'              => [
        'numeric' => 'Поле &ldquo;:attribute&rdquo; должно быть между :min и :max.',
        'file'    => 'Размер файла в поле &ldquo;:attribute&rdquo; должен быть между :min и :max Килобайт(а).',
        'string'  => 'Количество символов в поле &ldquo;:attribute&rdquo; должно быть между :min и :max.',
        'array'   => 'Количество элементов в поле &ldquo;:attribute&rdquo; должно быть между :min и :max.',
    ],
    'boolean'              => 'Поле &ldquo;:attribute&rdquo; должно иметь значение логического типа.', // калька 'истина' или 'ложь' звучала бы слишком неестественно
    'confirmed'            => 'Поле &ldquo;:attribute&rdquo; не совпадает с подтверждением.',
    'date'                 => 'Поле &ldquo;:attribute&rdquo; не является датой.',
    'date_format'          => 'Поле &ldquo;:attribute&rdquo; не соответствует формату :format.',
    'different'            => 'Поля &ldquo;:attribute&rdquo; и :other должны различаться.',
    'digits'               => 'Длина цифрового поля &ldquo;:attribute&rdquo; должна быть :digits.',
    'digits_between'       => 'Длина цифрового поля &ldquo;:attribute&rdquo; должна быть между :min и :max.',
    'email'                => 'Поле &ldquo;:attribute&rdquo; должно быть действительным электронным адресом.',
    'filled'               => 'Поле &ldquo;:attribute&rdquo; обязательно для заполнения.',
    'exists'               => 'Выбранное значение для &ldquo;:attribute&rdquo; некорректно.',
    'image'                => 'Поле &ldquo;:attribute&rdquo; должно быть изображением.',
    'in'                   => 'Выбранное значение для &ldquo;:attribute&rdquo; ошибочно.',
    'integer'              => 'Поле &ldquo;:attribute&rdquo; должно быть целым числом.',
    'ip'                   => 'Поле &ldquo;:attribute&rdquo; должно быть действительным IP-адресом.',
    'json'                 => 'Поле &ldquo;:attribute&rdquo; должно быть JSON строкой.',
    'max'                  => [
        'numeric' => 'Поле &ldquo;:attribute&rdquo; не может быть более :max.',
        'file'    => 'Размер файла в поле &ldquo;:attribute&rdquo; не может быть более :max Килобайт(а).',
        'string'  => 'Количество символов в поле &ldquo;:attribute&rdquo; не может превышать :max.',
        'array'   => 'Количество элементов в поле &ldquo;:attribute&rdquo; не может превышать :max.',
    ],
    'mimes'                => 'Поле &ldquo;:attribute&rdquo; должно быть файлом одного из следующих типов: :values.',
    'min'                  => [
        'numeric' => 'Поле &ldquo;:attribute&rdquo; должно быть не менее :min.',
        'file'    => 'Размер файла в поле &ldquo;:attribute&rdquo; должен быть не менее :min Килобайт(а).',
        'string'  => 'Количество символов в поле &ldquo;:attribute&rdquo; должно быть не менее :min.',
        'array'   => 'Количество элементов в поле &ldquo;:attribute&rdquo; должно быть не менее :min.',
    ],
    'not_in'               => 'Выбранное значение для &ldquo;:attribute&rdquo; ошибочно.',
    'numeric'              => 'Поле &ldquo;:attribute&rdquo; должно быть числом.',
    'regex'                => 'Поле &ldquo;:attribute&rdquo; имеет ошибочный формат.',
    'required'             => 'Поле &ldquo;:attribute&rdquo; обязательно для заполнения.',
    'required_if'          => 'Поле &ldquo;:attribute&rdquo; обязательно для заполнения, когда :other равно :value.',
    'required_unless'      => 'Поле &ldquo;:attribute&rdquo; обязательно для заполнения, когда :other не равно :values.',
    'required_with'        => 'Поле &ldquo;:attribute&rdquo; обязательно для заполнения, когда :values указано.',
    'required_with_all'    => 'Поле &ldquo;:attribute&rdquo; обязательно для заполнения, когда :values указано.',
    'required_without'     => 'Поле &ldquo;:attribute&rdquo; обязательно для заполнения, когда :values не указано.',
    'required_without_all' => 'Поле &ldquo;:attribute&rdquo; обязательно для заполнения, когда ни одно из :values не указано.',
    'same'                 => 'Значение &ldquo;:attribute&rdquo; должно совпадать с :other.',
    'size'                 => [
        'numeric' => 'Поле &ldquo;:attribute&rdquo; должно быть равным :size.',
        'file'    => 'Размер файла в поле &ldquo;:attribute&rdquo; должен быть равен :size Килобайт(а).',
        'string'  => 'Количество символов в поле &ldquo;:attribute&rdquo; должно быть равным :size.',
        'array'   => 'Количество элементов в поле &ldquo;:attribute&rdquo; должно быть равным :size.',
    ],
    'string'               => 'Поле &ldquo;:attribute&rdquo; должно быть строкой.',
    'timezone'             => 'Поле &ldquo;:attribute&rdquo; должно быть действительным часовым поясом.',
    'unique'               => 'Такое значение поля &ldquo;:attribute&rdquo; уже существует.',
    'url'                  => 'Поле &ldquo;:attribute&rdquo; имеет ошибочный формат.',
    /*
    |--------------------------------------------------------------------------
    | Собственные языковые ресурсы для проверки значений
    |--------------------------------------------------------------------------
    |
    | Здесь Вы можете указать собственные сообщения для атрибутов.
    | Это позволяет легко указать свое сообщение для заданного правила атрибута.
    |
    | http://laravel.com/docs/5.1/validation#custom-error-messages
    | Пример использования
    |
    |   'custom' => [
    |       'email' => [
    |           'required' => 'Нам необходимо знать Ваш электронный адрес!',
    |       ],
    |   ],
    |
    */
    'custom'               => [
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
    | Пример использования
    |
    |   'attributes' => [
    |       'email' => 'электронный адрес',
    |   ],
    |
    */
    'attributes'           => [
        //
    ],
];
