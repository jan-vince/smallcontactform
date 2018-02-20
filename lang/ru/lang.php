<?php

return [
  'plugin' => [
    'name' => 'Контактная форма',
    'description' => 'Простой конструктор контактной формы',
  ],

  'permissions' => [
    'access_messages' => 'Доступ к списку сообщений',
    'access_settings' => 'Управление настройками бэкенд',
    'delete_messages' => 'Удалить сохраненные сообщения',
  ],

  'navigation' => [
    'main_label' => 'Контакт форма',
    'messages' => 'Сообщения',
  ],

  'controller' => [

    'contact_form' => [
      'name' => 'Контактная форма',
      'description' => 'Вставьте контактную форму на страницу',
      'no_fields' => 'Для работы плагина следует добавить поля формы в бэкенд (Настройки > Контактная форма > Поля)...',
    ],

    'filter' => [
      'date' => 'Диапазон дат',
    ],

    'scoreboard' => [
      'records_count' => 'Сообщения',
      'latest_record' => 'Последнее от',
      'new_count' => 'Новые',
      'new_description' => 'Сообщения',
      'read_count' => 'Прочитанные',
      'all_count' => 'Всего',
      'all_description' => 'Сообщения',
      'settings_btn' => 'Настройки формы',
      'mark_read' => 'Отметить как прочитанное',
      'mark_read_confirm' => 'Вы действительно хотите отметить выбранные сообщения как прочитанные?',
      'mark_read_success' => 'Успешно отмечено как прочитанное',
    ],

    'preview' => [
      'record_not_found' => 'Сообщение не найдено!',
    ],

  ],

  'models' => [

    'message' => [

      'columns' => [
        'datetime' => 'Дата и время',
        'form_data' => 'Данные формы',
        'name' => 'Имя',
        'message' => 'Сообщение',
        'new_message' => 'Статус',
        'new' => 'Новое',
        'read' => 'Прочитанное',
        'remote_ip' => 'IP отправителя',
        'form_alias' => 'Псевдоним',
        'form_description' => 'Описание',
      ]

    ],


  ],

  'controllers' => [

    'messages' => [

      'list_title' => 'Сообщения',
      'preview' => 'Предварительный просмотр',
      'preview_title' => 'Сообщение контактной формы',
      'preview_date' => 'От даты:',
      'preview_content_title' => 'Содержание:',
      'remote_ip' => 'Отправлено с IP',

    ],

    'index' => [
      'unauthorized' => 'Несанкционированный доступ',
    ],

  ],

  'reportwidget' => [

    'partials' => [

      'messages' => [
        'label' => 'Контактная форма - Статистика сообщений',
        'title' => 'Статистика сообщений',
        'messages_all' => 'Все',
        'messages_new' => 'Новые',
        'messages_read' => 'Прочитанные',
      ],

      'new_message' => [
        'label' => 'Контактная форма - Новое сообщение',
        'title' => 'Новое сообщение',
        'link_text' => 'Нажмите, чтобы показать список сообщений',
      ],

    ],

  ],

  'settings' => [

    'form' => [

      'css_class' => 'CSS классы формы',

      'use_placeholders' => 'Использовать заполнители формы',
      'use_placeholders_comment' => 'Будет скрыт <label>, а текст метки будет показан внутри поля.',

      'disable_browser_validation' => 'Отключить валидацию браузера',
      'disable_browser_validation_comment' => 'Запретить встроенные проверки и всплывающие окна браузера.',

      'success_msg' => 'Текст сообщения об успешной отправке',
      'success_msg_placeholder' => 'Ваше сообщение доставлено',

      'error_msg' => 'Текст сообщения о ошибке',
      'error_msg_placeholder' => 'При отправке сообщения произошла ошибка',

      'allow_ajax' => 'Включить AJAX',
      'allow_ajax_comment' => 'Разрешить AJAX с откатом для браузеров без JavaScript.',

      'allow_confirm_msg' => 'Запрашивать подтверждение перед отправкой формы',
      'allow_confirm_msg_comment' => 'Добавить текст диалога перед отправкой.',

      'send_confirm_msg' => 'Текст подтверждения',
      'send_confirm_msg_placeholder' => 'Отправить сообщение?',

      'hide_after_success' => 'Скрыть форму после успешной отправки',
      'hide_after_success_comment' => 'Показать только сообщение об успешной отправке.',

    ],

    'buttons' => [
      'send_btn_text' => 'Текст на кнопке',
      'send_btn_text_placeholder' => 'Отправить',

      'send_btn_css_class' => 'CSS классы кнопки',

      'send_btn_wrapper_css' => 'CSS классы обертки (wrapper) кнопки',

    ],

    'redirect' => [

      'allow_redirect' => 'Редирект после отправки',
      'allow_redirect_comment' => 'Перенаправить пользователя на другую страницу после успешного отправки формы.',

      'redirect_url' => 'URL страницы для перенаправления',
      'redirect_url_comment' => 'Введите URL-адрес страницы (например: /contact/thank-you)',

      'redirect_url_external' => 'Внешний URL',
      'redirect_url_external_comment' => 'Отметьте, если это внешний адрес (например: http://www.domain.com).',

    ],

    'form_fields' => [
      'prompt' => 'Добавить новое поле формы',

      'name' => 'ИМЯ ПОЛЯ',
      'name_comment' => 'Нижний регистр без специальных символов (например: name, email, home_address, ...).',

      'type' => 'Тип поля',

      'label' => 'Метка поля',
      'label_placeholder' => 'Ваше имя',

      'field_styling' => 'Пользовательские CSS классы',
      'field_styling_comment' => 'Изменение стандартных Bootstrap стилей.',

      'autofocus' => 'Автофокус',
      'autofocus_comment' => 'Автофокусировка на этом поле формы.',

      'wrapper_css' => 'CSS классы обертки (wrapper)',

      'field_css' => 'CSS классы полей <input>',

      'label_css' => 'CSS классы метки <label>',
      'label_css_placeholder' => '',

      'field_validation' => 'Валидация поля',
      'field_validation_comment' => 'Добавить правила для проверки поля.',

      'validation' => 'Валидация',
      'validation_prompt' => 'Добавить валидацию',

      'validation_error' => 'Сообщение при ошибке валидации',
      'validation_error_placeholder' => 'Данные введены не верно',
      'validation_error_comment' => 'Сообщение об ошибке, если валидация не пройдена.',

    ],

    'email' => [
      'address_from' => 'От адреса',

      'address_from_name' => 'От имени',

      'subject' => 'Тема письма',
      'subject_comment' => 'Установите если хотите использовать отличное от шаблона, Настройки > Шаблоны почты.',

      'template' => 'Шаблон почты',
      'template_comment' => 'Код шаблона почты, созданный в Настройки > Шаблоны почты. Если оставить пустым будет использован по умолчанию: janvince.smallcontactform::mail.autoreply.',

      'allow_notifications' => 'Разрешить уведомления',
      'allow_notifications_comment' => 'Отправлять уведомление на email после отправки формы.',

      'notification_address_to' => 'Отправить уведомление на email',

      'allow_autoreply' => 'Автоматический ответ',
      'allow_autoreply_comment' => 'Отправлять копию содержимого формы автору.',

      'autoreply_name_field' => 'Поле формы NAME',
      'autoreply_name_field_comment' => 'Должен быть тип поля: Text.<br><em>Сохраните и обновите эту страницу, если вы не видите свои поля.</em>',

      'autoreply_email_field' => 'Поле формы EMAIL',
      'autoreply_email_field_comment' => 'Должен быть тип поля: Email.<br><em>Сохраните и обновите эту страницу, если вы не видите свои поля.</em>',

      'autoreply_message_field' => 'Поле формы MESSAGE',
      'autoreply_message_field_comment' => 'Должен быть тип поля: Textarea или Text.<br><em>Сохраните и обновите эту страницу, если вы не видите свои поля.</em>',

      'notification_template' => 'Шаблон почты для уведомления',
      'notification_template_comment' => 'Код шаблона почты, созданный в Настройки > Шаблоны почты. Если оставить пустым будет использован по умолчанию: janvince.smallcontactform::mail.autoreply.',

    ],

    'antispam' => [
      'add_antispam' => 'Добавить пассивную антиспам защиту',
      'add_antispam_comment' => 'Простая, но эффективная антиспам защита (подробнее в README.md файле).',

      'antispam_delay' => 'Антиспам задержка в секундах',
      'antispam_delay_comment' => 'Защищает от слишком быстрой отправки формы (против роботов).',
      'antispam_delay_placeholder' => '3',

      'antispam_label' => 'Метка поля антиспама',
      'antispam_label_comment' => 'Будет отображаться в браузерах с выключенным JavaScript.',
      'antispam_label_placeholder' => 'Пожалуйста очистите это поле',

      'antispam_error_msg' => 'Текст сообщения при ошибке',
      'antispam_error_msg_comment' => 'Сообщение будет показано пользователю, при срабатывании защиты от спама',
      'antispam_error_msg_placeholder' => 'Антиспам - Пожалуйста очистите это поле!',

      'antispam_delay_error_msg' => 'Текст сообщения при ошибке',
      'antispam_delay_error_msg_comment' => 'Сообщение для пользователя, чтобы показать, что форма была отправлена слишком быстро.',
      'antispam_delay_error_msg_placeholder' => 'Форма отправлена слишком быстро, пожалуйста подождите 5 секунд.',

      'add_google_recaptcha' => 'Добавить Google reCaptcha',
      'add_google_recaptcha_comment' => 'Добавить reCaptcha в контактную форму (подробнее в README.md файле).<br>Вы можете получить API ключ на <a href="https://www.google.com/recaptcha/admin#list" target="_blank">Google reCaptcha site</a>.',

      'google_recaptcha_site_key_comment' => 'Введите ключ своего сайта',

      'google_recaptcha_secret_key_comment' => 'Введите секретный ключ',

      'google_recaptcha_error_msg' => 'Текст сообщения при ошибке',
      'google_recaptcha_error_msg_comment' => 'Сообщение для пользователя, когда он не прошел проверку reCAPTCHA.',
      'google_recaptcha_error_msg_placeholder' => 'Google reCAPTCHA ошибка валидации!',

      'google_recaptcha_scripts_allow' => 'Автоматический добавить JavaScript',
      'google_recaptcha_scripts_allow_comment' => 'Добавить загрузку необходимых JavaScript на ваш сайт.',

      'google_recaptcha_locale_allow' => 'Разрешить локализацию',
      'google_recaptcha_locale_allow_comment' => 'Переведет reCAPTCHA, в соответствии с языком веб-страницы.',

      'add_ip_protection' => 'Проверять IP-адрес отправителя',
      'add_ip_protection_comment' => 'Ограничивает число отправки форм с одного IP-адреса.',

      'add_ip_protection_count' => 'Максимальное число отправки форм за день',
      'add_ip_protection_count_comment' => 'Количество разрешенных отправлений формы с одного IP-адреса в течение одного дня.',
      'add_ip_protection_count_placeholder' => '3',

      'add_ip_protection_error_too_many_submits' => 'Сообщение об ошибке',
      'add_ip_protection_error_too_many_submits_comment' => 'Текст ошибки при привышении максимального числа отправок, для показа пользователю.',
      'add_ip_protection_error_too_many_submits_placeholder' => 'С вашего IP отправлено слишком много форм!',


    ],

    'mapping' => [

      'hint' => [
        'title' => 'Почему отображение полей?',
        'content' => '
        <p>Вы можете создать пользовательскую форму с собственными именами и типами полей.</p>
        <p>Система записывает все данные формы в базу данных. Для быстрого обзора в бэкенд Контакт форма > Сообщения, нужно привязать поля: Имя, Email, Сообщения.</p>
        <p>Поэтому вам необходимо помочь системе идентифицировать эти столбцы, сопоставляя их с полями формы.</p>
        <p><em>Эти сопоставления также используются для атоматической отправки писем, где важно, по крайней мере, сопоставление поля Email.</em></p>
        ',
      ],

      'warning' => [
        'title' => 'Не можете выбрать поля формы?',
        'content' => '
        <p>Если вы не видите свои поля, нажмите кнопку «Сохранить» в нижней части этой страницы, а затем перезагрузите страницу (F5 или Ctr+R / Cmd+R).</p>
        ',
      ],

    ],

    'tabs' => [
      'form' => 'Форма',
      'buttons' => 'Кнопка отправки',
      'form_fields' => 'Редактор полей',
      'mapping' => 'Отображение',
      'email' => 'Email',
      'antispam' => 'АнтиСпам',
    ],

  ],

];
