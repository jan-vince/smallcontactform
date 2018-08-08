<?php

return [
  'plugin' => [
    'name' => 'Kapcsolat űrlap',
    'description' => 'Űrlap generálása kapcsolat felvételhez.',
    'category' => 'Small plugins',
  ],

  'permissions' => [
    'access_messages' => 'Üzenetek megtekintése',
    'access_settings' => 'Beállítások módosítása',
    'delete_messages' => 'Üzenetek törlése',
    'export_messages' => 'Üzenetek exportálása',
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
      'new_description' => 'üzenet',
      'read_count' => 'Olvasott',
      'all_count' => 'Összes',
      'all_description' => 'üzenet',
      'settings_btn' => 'Testreszabás',
      'mark_read' => 'Olvasottnak jelöl',
      'mark_read_confirm' => 'Valóban olvasottnak szeretné jelölni az üzeneteket?',
      'mark_read_success' => 'Az üzenetek sikeresen olvasottnak lettek jelölve.',
    ],

    'preview' => [
      'record_not_found' => 'Üzenet nem található!',
    ],

  ],

  'models' => [

    'message' => [

      'columns' => [
        'id' => 'ID',
        'datetime' => 'Elküldve',
        'form_data' => 'Adatok',
        'name' => 'Név',
        'email' => 'Email',
        'message' => 'Üzenet',
        'new_message' => 'Státusz',
        'new' => 'Új levél',
        'read' => 'Olvasott',
        'remote_ip' => 'IP cím',
        'form_alias' => 'Űrlap',
        'form_description' => 'Leírás',
        'created_at' => 'Létrehozva',
        'updated_at' => 'Módosítva',
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
      'export' => 'Exportálás',
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

  'components' => [

      'groups' => [
          'hacks' => 'Hackelés',
      ],

      'properties' => [
          'disable_notifications' => 'Értesítő e-mailek letiltása',
          'disable_notifications_comment' => 'Felül fogja írni az űrlap központi beállítását erre vonatkozóan.',
          'form_description' => 'Űrlap leírás',
          'form_description_comment' => 'Amennyiben megad adatot, azok mentésre kerülnek az űrlap beküldésekor. Például az aktuális oldal címének megjegyzéséhez használhatja a {{ :slug }} kódot.',
      ],

  ],

];
