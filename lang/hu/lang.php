<?php

return [
  'plugin' => [
    'name' => 'Kapcsolat űrlap',
    'description' => 'Űrlap generálása kapcsolat felvételhez.',
    'category' => 'Small plugins',
  ],

  'permissions' => [
    'access_messages' => 'Üzenetek megtekintése',
    'delete_messages' => 'Üzenetek törlése',
    'access_settings' => 'Beállítások módosítása',
  ],

  'navigation' => [
    'main_label' => 'Kapcsolat űrlap',
    'messages' => 'Üzenetek',
  ],

  'controller' => [

    'contact_form' => [
      'name' => 'Kapcsolat űrlap',
      'description' => 'Űrlap generálása kapcsolat felvételhez.',
      'no_fields' => 'Elsőként hozzon létre legalább egy mezőt itt: Beállítások > Small plugins > Kapcsolat űrlap > Fields',
    ],

    'filter' => [
      'date' => 'Időintervallum',
    ],

    'scoreboard' => [
      'records_count' => 'Üzenetek',
      'latest_record' => 'Legutóbbi',
      'new_count' => 'Új levél',
      'read_count' => 'Olvasott',
      'all_count' => 'Összes',
      'all_description' => 'üzenet',
      'settings_btn' => 'Testreszabás',
    ],

    'preview' => [
      'record_not_found' => 'Üzenet nem található!',
    ],

  ],

  'models' => [

    'message' => [

      'columns' => [
        'datetime' => 'Elküldve',
        'form_data' => 'Adatok',
        'name' => 'Név',
        'email' => 'Email',
        'message' => 'Üzenet',
        'new_message' => 'Státusz',
        'new' => 'Új levél',
        'read' => 'Olvasott',
        'remote_ip' => 'IP cím',
      ],

    ],

  ],

  'controllers' => [

    'messages' => [
      'list_title' => 'Üzenetek',
      'preview' => 'Előnézet',
      'preview_title' => 'Üzenet',
      'preview_date' => 'Elküldve:',
      'preview_content_title' => 'Tartalom:',
      'remote_ip' => 'IP cím',
    ],

    'index' => [
      'unauthorized' => 'Illetéktelen hozzáférés',
    ],

  ],

  'mail' => [

    'templates' => [

      'autoreply' => 'Automatikus üzenet (angol)',
      'autoreply_cs' => 'Automatikus üzenet (cseh)',

      'notification' => 'Értesítő üzenet (angol)',
      'notification_cs' => 'Értesítő üzenet (cseh)',
    ]

  ],

  'reportwidget' => [

    'partials' => [
      'messages' => [
        'label' => 'Kapcsolat űrlap - Statisztika',
        'title' => 'Üzenet statisztika',
        'messages_all' => 'Összes',
        'messages_new' => 'Új levél',
        'messages_read' => 'Olvasott',
      ],

      'new_message' => [
        'label' => 'Kapcsolat űrlap - Új üzenetek',
        'title' => 'Új üzenetek',
        'link_text' => 'Összes üzenet megtekintése',
      ],

    ],

  ],

  'permissions' => [
    'access_messages' => 'Üzenetek megtekintése',
    'access_settings' => 'Beállítások módosítása',
  ],

];
