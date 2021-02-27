<?php

return [
  'plugin' => [
    'name' => 'Kontaktformular',
    'description' => 'Kontaktformular',
    'category' => 'Kontaktformular',
  ],

  'permissions' => [
    'access_messages' => 'Auf Nachrichtenliste zugreifen',
    'access_settings' => 'Backendeinstellungen bearbeiten',
    'delete_messages' => 'gespeicherte Nachrichten löschen',
    'export_messages' => 'gespeicherte Nachrichten exportieren',
  ],

  'navigation' => [
    'main_label' => 'Kontaktformular',
    'messages' => 'Nachrichten',
  ],

  'controller' => [

    'contact_form' => [
      'name' => 'Kontaktformular',
      'description' => 'Kontaktformular in die Seite einfügen',
      'no_fields' => 'Bitte fügen Sie zuerst einige Formularfelder in der Backend-Administration hinzu (in Einstellungen > Kontaktformular > Felder)...',
    ],

    'filter' => [
      'date' => 'Datumsbereich',
    ],

    'scoreboard' => [
      'records_count' => 'Nachrichten',
      'latest_record' => 'Letzte von',
      'new_count' => 'Neu',
      'new_description' => 'Nachrichten',
      'read_count' => 'Gelesen',
      'all_count' => 'Insgesamt',
      'all_description' => 'Nachrichten',
      'settings_btn' => 'Formular Einstellungen',
      'mark_read' => 'Als Gelesen markieren',
      'mark_read_confirm' => 'Möchten Sie wirklich die ausgewählten Nachrichten als gelesen markeiren?',
      'mark_read_success' => 'Erfolgreich als gelesen markiert.',
    ],

    'preview' => [
      'record_not_found' => 'Nachricht nicht gefunden!',
    ],

  ],

  'models' => [

    'message' => [

      'columns' => [
        'id' => 'ID',
        'datetime' => 'Datum und Zeit',
        'form_data' => 'Daten',
        'name' => 'Name',
        'email' => 'Email',
        'message' => 'Nachricht',
        'new_message' => 'Status',
        'new' => 'Neu',
        'read' => 'Gelesen',
        'remote_ip' => 'IP des Absenders',
        'form_alias' => 'Alias',
        'form_description' => 'Beschreibung',
        'created_at' => 'Erstellt am',
        'updated_at' => 'Geupdated am',
      ]

    ],


  ],

  'controllers' => [

    'messages' => [

      'list_title' => 'Nachrichten',
      'preview' => 'Vorschau',
      'preview_title' => 'Nachricht',
      'preview_date' => 'Datum:',
      'preview_content_title' => 'Inhalt:',
      'remote_ip' => 'Von IP gesendet:',
      'export' => 'Exportieren',
    ],

    'index' => [
      'unauthorized' => 'Unerlaubter Zugriff',
    ],

  ],

  'mail' => [

    'templates' => [

      'autoreply' => 'Form autoreply message (English)',
      'autoreply_cs' => 'Form autoreply message (Czech)',

      'notification' => 'Form notification message (English)',
      'notification_cs' => 'Form notification message (Czech)',

    ]

  ],

  'reportwidget' => [

    'partials' => [

      'messages' => [
        'label' => 'Kontaktformular - Nachrichtenstatistik',
        'title' => 'Nachrichtenstatistik',
        'messages_all' => 'Alle',
        'messages_new' => 'Neu',
        'messages_read' => 'Gelesen',
      ],

      'new_message' => [
        'label' => 'Kontaktformular - Neue Nachrichten',
        'title' => 'Neue Nachrichten',
        'link_text' => 'Hier klicken, um die Liste aller Nachrichten anzuzeigen',
      ],

    ],

  ],

  'settings' => [

    'form' => [

      'css_class' => 'Formular CSS Klasse',

      'use_placeholders' => 'Platzhalter benutzen',
      'use_placeholders_comment' => 'Platzhalter werden anstelle von Labels verwendet',

      'disable_browser_validation' => 'Browservalidierung deaktivieren',
      'disable_browser_validation_comment' => 'Integrierte Validierung und Popups im Browser nicht zulassen.',

      'success_msg' => 'Form success message',
      'success_msg_placeholder' => 'Wir haben Ihre Nachricht erhalten.',

      'error_msg' => 'Form error message',
      'error_msg_placeholder' => 'Es gab einen Fehler beim Senden Ihrer Daten!',

      'allow_ajax' => 'Enable AJAX',
      'allow_ajax_comment' => 'AJAX mit Fallback für Browser ohne JavaScript verwenden',

      'allow_confirm_msg' => 'Vor dem Absenden des Formulars um Bestätigung bitten',
      'allow_confirm_msg_comment' => 'Bestätigungsdialog vor dem Senden hinzufügen',

      'send_confirm_msg' => 'Bestätigungs-Text',
      'send_confirm_msg_placeholder' => 'Sind Sie sicher?',

      'hide_after_success' => 'Formular nach erfolgreichem Senden ausblenden',
      'hide_after_success_comment' => 'Nur Erfolgsmeldung ohne Formular anzeigen',

      'add_assets' => 'Assets hinzufügen',
      'add_assets_comment' => 'Automatisches Hinzufügen notwendiger CSS- und JS-Assets (mehr über Assets in der Datei README.md)',

      'add_css_assets' => 'CSS Assets hinzufügen',
      'add_css_assets_comment' => 'Alle benötigten CSS Dateien werden hinzugefügt',

      'add_js_assets' => 'JavaScript Assets hinzufügen',
      'add_js_assets_comment' => 'Alle benötigten JavaScript Dateien werden hinzugefügt',


    ],

    'buttons' => [
      'send_btn_text' => 'Text senden Button',
      'send_btn_text_placeholder' => 'Absenden',

      'send_btn_css_class' => 'CSS Klasse senden Button',
      'send_btn_css_class_placeholder' => 'btn btn-primary',

      'send_btn_wrapper_css' => 'CSS Klasse des senden Button wrappers',
      'send_btn_wrapper_css_placeholder' => 'form-group',

    ],

    'redirect' => [

      'allow_redirect' => 'Nach dem Einreichen umleiten',
      'allow_redirect_comment' => 'Nach erfolgreicher Übermittlung auf eine andere Seite umleiten',

      'redirect_url' => 'URL der Seite, auf die umgeleitet werden soll',
      'redirect_url_comment' => 'Geben Sie die URL Ihrer Seite ein (bspw. /kontact/danke)',
      'redirect_url_placeholder' => '/kontakt/danke',

      'redirect_url_external' => 'Externe URL',
      'redirect_url_external_comment' => 'Dies ist ein externer URL-Pfad (bspw. http://www.domain.com',

    ],

    'form_fields' => [
      'prompt' => 'Neues Formularfeld hinzufügen',

      'name' => 'FELDNAME',
      'name_comment' => 'Kleinbuchstaben ohne Sonderzeichen (bspw. name, email, adresse, ...)',

      'type' => 'Feldtyp',

      'label' => 'Label',
      'label_placeholder' => 'Vollständiger Name',

      'field_styling' => 'Eigene CSS Klasse',
      'field_styling_comment' => 'Ändern der Standard-Bootstrap-Stile',

      'autofocus' => 'Autofokus-Feld',
      'autofocus_comment' => 'Autofokus für dieses Formularfeld',

      'wrapper_css' => 'Wrapper CSS-Klasse',
      'wrapper_css_placeholder' => 'form-group',

      'field_css' => 'Feld CSS-Klasse',
      'field_css_placeholder' => 'form-control',

      'label_css' => 'Label CSS-Klasse',
      'label_css_placeholder' => '',

      'field_validation' => 'Feldüberprüfung',
      'field_validation_comment' => 'Feldüberprüfungsregeln hinzufügen',

      'validation' => 'Validierung',
      'validation_prompt' => 'Validierung hinzufügen',

      'validation_type' => 'Validierungsregel',

      'validation_error' => 'Validierungs-Fehlermeldung',
      'validation_error_placeholder' => 'Bitte gültige Daten eingeben.',
      'validation_error_comment' => 'Fehlermeldung, die zu verwenden ist, wenn die Validierung fehlschlägt',

      'validation_custom_type' => 'Name der Validierungsregel',
      'validation_custom_type_comment' => 'Validator-Regelnamen eingeben (bspw. regex, boolean, ...).<br>See <a href="https://octobercms.com/docs/services/validation#available-validation-rules" target="_blank">validation rules</a>.',
      'validation_custom_type_placeholder' => 'regex',

      'validation_custom_pattern' => 'Muster für Validierungsregeln',
      'validation_custom_pattern_comment' => 'Left empty or enter custom rule pattern (this is a right part of Validator rule after colon - eg. [abc] for regex).',
      'validation_custom_pattern_placeholder' => "/^[0-9]+$/",

      'custom' => 'Benutzerdefiniertes Feld',
      'custom_description' => 'Benutzerdefiniertes Feld mit Validierungsoption',

      'add_values_prompt' => 'Werte hinzufügen',
      'field_value_id' => 'Feld ID',
      'field_value_content' => 'Feld Inhalt',

    ],

    'form_field_types' => [
      'text' => 'Text',
      'email' => 'Email',
      'textarea' => 'Textbereich',
      'checkbox' => 'Checkbox',
      'dropdown' => 'Dropdown-Menü',
      'file' => 'File',
      'custom_code' => 'Custom code',
      'custom_content' => 'Custom content',
    ],

    'form_field_validation' => [
      'select' => '--- Validierung auswählen ---',
      'required' => 'erforderlich',
      'email' => 'Email',
      'numeric' => 'Numerisch',
      'custom' => 'Benutzerdefinierte Regel',
    ],

    'email' => [
      'address_from' => 'Absenderaddresse',
      'address_from_placeholder' => 'max.mustermann@domain.de',

      'address_from_name' => 'Absendername',
      'address_from_name_placeholder' => 'Max Mustermann',

      'subject' => 'Email subject',
      'subject_comment' => 'Nur einstellen, wenn Sie andere als die unter Einstellungen > Mail-Vorlagen definierten Einstellungen wünschen.',

      'template' => 'Email template',
      'template_comment' => 'Code der E-Mail-Vorlage, die unter Einstellungen > E-Mail-Vorlagen erstellt wurde. Bei Standardvorlage leer lassen: janvince.smallcontactform::mail.autoreply.',

      'allow_email_queue' => 'E-Mail in Warteschlange setzen',
      'allow_email_queue_comment' => 'Fügen Sie E-Mails in die Warteschlange ein, anstatt sie sofort zu senden. Sie müssen zuerst Ihre OctoberCMS-Warteschlange konfigurieren!',

      'allow_notifications' => 'Benachrichtigungen zulassen',
      'allow_notifications_comment' => 'Benachrichtigung senden, nachdem das Formular gesendet wurde',

      'notification_address_to' => 'Benachrichtigung an E-Mail senden',
      'notification_address_to_comment' => 'Eine E-Mail-Adresse oder eine durch Komma getrennte Liste von Adressen',
      'notification_address_to_placeholder' => 'kontakt@domain.de',

      'notification_address_from_form' => 'Benachrichtigung von der Adresse des Absenders erzwingen (NICHT von allen E-Mail-Systemen UNTERSTÜTZT!)',
      'notification_address_from_form_comment' => 'Benachrichtigung von Adresse auf eine im Kontaktformular eingegebene E-Mail setzen (das Feld muss in der Spaltenzuordnung gesetzt werden).',

      'allow_autoreply' => 'Autoreply zulassen',
      'allow_autoreply_comment' => 'Senden Sie eine Kopie des Formularinhalts an den Autor',

      'autoreply_name_field' => 'NAME form field',
      'autoreply_name_field_empty_option' => '-- Select --',
      'autoreply_name_field_comment' => 'Must be type of Text.<br><em>Save and refresh this page if you can\'t see your fields.</em>',

      'autoreply_email_field' => 'EMAIL address form field',
      'autoreply_email_field_empty_option' => '-- Select --',
      'autoreply_email_field_comment' => 'Must be type of Email.<br><em>Save and refresh this page if you can\'t see your fields.</em>',

      'autoreply_message_field' => 'MESSAGE form field',
      'autoreply_message_field_empty_option' => '-- Select --',
      'autoreply_message_field_comment' => 'Must be type of Textarea or Text.<br><em>Save and refresh this page if you can\'t see your fields.</em>',

      'notification_template' => 'Notification email template',
      'notification_template_comment' => 'Code of email template created in Settings > Email templates. Left empty for default template: janvince.smallcontactform::mail.autoreply.',

    ],

    'antispam' => [
      'add_antispam' => 'Add passive antispam protection',
      'add_antispam_comment' => 'Add simple but effective passive antispam control (more info in README.md file)',

      'antispam_delay' => 'Antispam delay (s)',
      'antispam_delay_comment' => 'Delay protection for too fast form sending (usually by robots)',
      'antispam_delay_placeholder' => '3',

      'antispam_label' => 'Antispam field label',
      'antispam_label_comment' => 'Label will be visible for non JavaScript enabled browsers',
      'antispam_label_placeholder' => 'Please clear this field',

      'antispam_error_msg' => 'Error message',
      'antispam_error_msg_comment' => 'Message to show to user when antispam protection is triggered',
      'antispam_error_msg_placeholder' => 'Please empty this field!',

      'antispam_delay_error_msg' => 'Delay error message',
      'antispam_delay_error_msg_comment' => 'Message to show to user when form was sent too fast',
      'antispam_delay_error_msg_placeholder' => 'Form sent too fast! Please wait few seconds and try again!',

      'add_google_recaptcha' => 'Add Google reCaptcha',
      'add_google_recaptcha_comment' => 'Add reCaptcha to Contact Form (more info in README.md file).<br>You can get API keys on <a href="https://www.google.com/recaptcha/admin#list" target="_blank">Google reCaptcha site</a>.',

      'google_recaptcha_version' => 'Google reCaptcha version',
      'google_recaptcha_version_comment' => 'Choose a version of reCaptcha widget.<br>More info on <a href="https://developers.google.com/recaptcha/docs/versions" target="_blank">Google reCaptcha site</a>.',
      
      'google_recaptcha_versions' => [
        'v2checkbox' => 'reCaptcha V2 checkbox',
        'v2invisible' => 'reCaptcha V2 invisible',
      ],

      'google_recaptcha_site_key' => 'Site key',
      'google_recaptcha_site_key_comment' => 'Put your site key',

      'google_recaptcha_secret_key' => 'Secret key',
      'google_recaptcha_secret_key_comment' => 'Put your secret key',

      'google_recaptcha_wrapper_css' => 'reCaptcha box wrapper CSS class',
      'google_recaptcha_wrapper_css_comment' => 'CSS class of wrapper box around reCaptcha box',
      'google_recaptcha_wrapper_css_placeholder' => 'form-group',

      'google_recaptcha_error_msg' => 'Error message',
      'google_recaptcha_error_msg_comment' => 'Message to show to user when reCAPTCHA is not validated.',
      'google_recaptcha_error_msg_placeholder' => 'Google reCAPTCHA validation error!',

      'google_recaptcha_scripts_allow' => 'Automatically add necessary JS scripts',
      'google_recaptcha_scripts_allow_comment' => 'This will add link to JS scripts to your site.',

      'google_recaptcha_locale_allow' => 'Allow locale detection',
      'google_recaptcha_locale_allow_comment' => 'This will add curent web page locale to reCAPTCHA script, so it will translated.',

      'add_ip_protection' => 'Check sender\'s IP',
      'add_ip_protection_comment' => 'Do not allow too many form submits from one IP address',

      'add_ip_protection_count' => 'Maximum form submits during a day',
      'add_ip_protection_count_comment' => 'Number of allowed submits from one IP address during a single day',
      'add_ip_protection_count_placeholder' => '3',

      'add_ip_protection_error_get_ip' => 'We wasn\'t able to determine your IP address!',

      'add_ip_protection_error_too_many_submits' => 'Too many submits error message',
      'add_ip_protection_error_too_many_submits_comment' => 'Error message to show to the user',
      'add_ip_protection_error_too_many_submits_placeholder' => 'Too many form submits from one address today!',

      'disabled_extensions' => 'Disabled extensions',
      'disabled_extensions_comment' => 'Settings set on Privacy tab disabled these extensions',

    ],

    'mapping' => [

      'hint' => [
        'title' => 'Why fields mapping?',
        'content' => '
        <p>You can build a custom form with own field names and types.</p>
        <p>System writes all form data in database, but for quick overview Name, Email and Message columns are visible separately in Messages list.</p>
        <p>So you have to help system to identify these columns by mapping to your form fields.</p>
        <p><em>These mappings are also used for autoreply emails where at least Email field mapping is important.</em></p>
        ',
      ],

      'warning' => [
        'title' => 'Can\'t select your form fields?',
        'content' => '
        <p>If you don\'t see your form fields, click on button Save at the bottom of this page and then reload page (F5 or Ctr+R / Cmd+R).</p>
        ',
      ],

    ],

    'privacy' => [
      'disable_messages_saving' => 'Disable messages saving',
      'disable_messages_saving_comment' => 'When checked, no data will saved in Messages list.<br><strong>This will also disable IP protection!</strong>',
      'disable_messages_saving_comment_section' => '<div class="callout fade in callout-danger no-subheader"><div class="header"><i class="icon-warning"></i><h3>Be sure to allow notification emails or you will have no data from sent forms!</h3></div></div>',
    ],

    'tabs' => [
      'form' => 'Form',
      'buttons' => 'Send button',
      'form_fields' => 'Fields',
      'mapping' => 'Columns mapping',
      'email' => 'Email',
      'antispam' => 'Antispam',
      'privacy' => 'Privacy'
    ],

  ],

  'components' => [

      'groups' => [

          'hacks' => 'Hacks',
          'override_form' => 'Override form settings',
          'override_notifications' => 'Override notification settings',
          'override_autoreply' => 'Override autoreply settings',
          'override' => 'Override form settings',


      ],
      'properties' => [

        'form_description' => 'Form description',
        'form_description_comment' => 'You can add optional form description, that will be saved with other sent data in the messages list. You can also use {{ :slug }} here.',

        'disable_fields' => 'Disable fields',
        'disable_fields_comment' => 'This will disable listed fields. Add field names separated by pipe (eg. name|message|phone)',

        'send_btn_label' => 'Send button label',
        'send_btn_label_comment' => 'Override send button label',

        'form_success_msg' => 'Success message',
        'form_success_msg_comment' => 'Override success message shown after successful sent',

        'form_error_msg' => 'Error message',
        'form_error_msg_comment' => 'Override error message shown after unsuccessful sent',

        'disable_notifications' => 'Disable notification',
        'disable_notifications_comment' => 'This will disable notification emails (overrides form settings)',

        'notification_address_to' => 'Address TO',
        'notification_address_to_comment' => 'This will override email address where notification email will be sent (if enabled in form settings)',

        'notification_address_from' => 'Address FROM',
        'notification_address_from_comment' => 'This will override email address from where notification email will be sent',

        'notification_address_from_name' => 'Address FROM name',
        'notification_address_from_name_comment' => 'This will override email address name from where notification email will be sent',

        'notification_template' => 'Notification template',
        'notification_template_comment' => 'This will override notification email template (eg. janvince.smallcontactform::mail.notification)',

        'disable_autoreply' => 'Disable notification',
        'disable_autoreply_comment' => 'This will disable notification emails (overrides form settings)',

        'autoreply_address_from' => 'Address FROM',
        'autoreply_address_from_comment' => 'This will override email address in autoreply email (if enabled in form settings)',

        'autoreply_address_from_name' => 'Address (FROM) name',
        'autoreply_address_from_name_comment' => 'This will override email address name in autoreply email (if enabled in form settings)',

        'autoreply_template' => 'Autoreply template',
        'autoreply_template_comment' => 'This will override autoreply email template (eg. janvince.smallcontactform::mail.autoreply)',

      ]

  ],

];
