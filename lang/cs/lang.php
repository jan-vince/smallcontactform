<?php

return [
  'plugin' => [
    'name' => 'Kontaktní formulář',
    'description' => 'Jednoduchý kontaktní formulář',
    'category' => 'Small plugins',
  ],

  'permissions' => [
    'access_messages' => 'Přístup k seznamu zpráv',
    'access_settings' => 'Přístup k nastavení',
    'delete_messages' => 'Smazat vybrané zprávy',
    'export_messages' => 'Exportovat zprávy',
  ],

  'navigation' => [
    'main_label' => 'Kontaktní formulář',
    'messages' => 'Zprávy',
  ],

  'controller' => [

    'contact_form' => [
      'name' => 'Kontaktní formulář',
      'description' => 'Přidá do stránky kontaktní formulář',
      'no_fields' => 'Přidejte prosím nějaká formulářová pole v administraci systému (Nastavení > Kontaktní formulář > Pole)...',
    ],

    'filter' => [
      'date' => 'Rozmezí data',
    ],

    'scoreboard' => [
      'records_count' => 'Zprávy',
      'latest_record' => 'nejnovější od',
      'new_count' => 'Nové',
      'new_description' => 'Zpráv',
      'read_count' => 'Přečtené',
      'all_count' => 'Celkem',
      'all_description' => 'Zpráv',
      'settings_btn' => 'Nastavení formuláře',
      'mark_read' => 'Označit jako přečtené',
      'mark_read_confirm' => 'Opravdu chcete vybrané zprávy označit jako přečtené?',
      'mark_read_success' => 'Zprávy byly označeny jako přečtené.',
    ],

    'preview' => [
      'record_not_found' => 'Zpráva nebyla nalezena!',
    ],

  ],

  'models' => [

    'message' => [

      'columns' => [
        'id' => 'ID',
        'datetime' => 'Datum a čas',
        'form_data' => 'Data formuláře',
        'name' => 'Jméno',
        'email' => 'Email',
        'message' => 'Zpráva',
        'new_message' => 'Stav',
        'new' => 'Nová',
        'read' => 'Přečtená',
        'remote_ip' => 'IP odesílatele',
        'created_at' => 'Datum vytvoření',
        'updated_at' => 'Datum aktualizace',
      ]

    ],


  ],

  'controllers' => [

    'messages' => [

      'list_title' => 'Zprávy',
      'preview' => 'Náhled',
      'preview_title' => 'Zpráva z kontaktního formuláře',
      'preview_date' => 'Ze dne:',
      'preview_content_title' => 'Obsah:',
      'remote_ip' => 'odesláno z ip',
      'form_alias' => 'Alias',
      'form_description' => 'Popisek',   
      'export' => 'Export', 
    ],

    'index' => [
      'unauthorized' => 'Neoprávněný přístup!',
    ],

  ],

  'mail' => [

    'templates' => [
      'autoreply' => 'Zpráva automatické odpovědi z kontaktního formuláře (Anglicky)',
      'notification' => 'Notifikace z kontaktního formuláře (Anglicky)',
      'autoreply_cs' => 'Zpráva automatické odpovědi z kontaktního formuláře (Česky)',
      'notification_cs' => 'Notifikace z kontaktního formuláře (Česky)',
    ]

  ],

  'reportwidget' => [

    'partials' => [

      'messages' => [
        'label' => 'Kontaktní formulář - Přehled zpráv',
        'title' => 'Přehled zpráv',
        'messages_all' => 'Vše',
        'messages_new' => 'Nové',
        'messages_read' => 'Přečtené',
      ],

      'new_message' => [
        'label' => 'Kontaktní formulář - Nové zprávy',
        'title' => 'Nové zprávy',
        'link_text' => 'Klikněte pro zobrazení přehledu zpráv',
      ],

    ],

  ],

  'settings' => [

    'form' => [

      'css_class' => 'CSS třída formuláře',

      'use_placeholders' => 'Používat zástupný text (placeholder)',
      'use_placeholders_comment' => 'Místo popisků nad formulářovými poli bude použitý zástupný text',

      'disable_browser_validation' => 'Zakázat validaci prohlížečem',
      'disable_browser_validation_comment' => 'Nepovolit prohlížeči použít vlastní validaci a zobrazovat výstrahy.',

      'success_msg' => 'Zpráva po úspěšném odeslání',
      'success_msg_placeholder' => 'Formulář byl v pořádku odeslán.',

      'error_msg' => 'Chybová zpráva',
      'error_msg_placeholder' => 'Při odesílání formuláře došlo k chybě!',

      'allow_ajax' => 'Povolit AJAX',
      'allow_ajax_comment' => 'Povolí AJAX, ale umožní fungování formuláře i na prohlížečích s vypnutým JavaScriptem',

      'allow_confirm_msg' => 'Požadovat potvrzení před odesláním',
      'allow_confirm_msg_comment' => 'Zobrazí potvrzovací okno před odesláním formuláře',

      'send_confirm_msg' => 'Text potvrzení',
      'send_confirm_msg_placeholder' => 'Opravdu chcete odeslat formulář?',

      'hide_after_success' => 'Skrýt formulář po úspěšném odeslání',
      'hide_after_success_comment' => 'Po odeslání zobrazí pouze zprávu z potvrzením bez formuláře',

      'add_assets' => 'Přidat doplňky',
      'add_assets_comment' => 'Automaticky vloží potřebné CSS styly a JS skripty (Více informací je v souboru README.md)',

      'add_css_assets' => 'Přidat CSS styly',
      'add_css_assets_comment' => 'Vloží všechny potřebné styly',

      'add_js_assets' => 'Přidat JS skripty',
      'add_js_assets_comment' => 'Vloží všechny potřebné skripty',


    ],

    'buttons' => [
      'send_btn_text' => 'Text odesílacího tlačítka',
      'send_btn_text_placeholder' => 'Odeslat',

      'send_btn_css_class' => 'CSS třída odesílacího tlačítka',
      'send_btn_css_class_placeholder' => 'btn btn-primary',

      'send_btn_wrapper_css' => 'CSS třída kontejneru',
      'send_btn_wrapper_css_placeholder' => 'form-group',

    ],

    'redirect' => [

      'allow_redirect' => 'Přesměrovat po úspěšném odeslání',
      'allow_redirect_comment' => 'Přesměrovat na jinou stránku po úspěšném odeslání formuláře',

      'redirect_url' => 'URL stránky pro přesměrování',
      'redirect_url_comment' => 'Vložte URL adresu stránky, kam bude přesměrováno (např. /kontakt/diky)',
      'redirect_url_placeholder' => '/kontakt/diky',

      'redirect_url_external' => 'Externí URL',
      'redirect_url_external_comment' => 'Toto je adresa externí stránky (např. http://www.domain.com)',

    ],

    'form_fields' => [
      'prompt' => 'Přidat nové pole formuláře',

      'name' => 'NÁZEV POLE',
      'name_comment' => 'Malými písmeny bez diakritiky (např. jmeno, email, vase_poznamka, ...)',

      'type' => 'Typ pole',

      'label' => 'Popisek (label)',
      'label_placeholder' => 'Pole formuláře',

      'field_styling' => 'Vlastní CSS třídy',
      'field_styling_comment' => 'Můžete přidat vlastní styly',

      'autofocus' => 'Automaticky zvýraznit (autofocus)',
      'autofocus_comment' => 'Po zobrazení nastavit na poli kurzor',

      'wrapper_css' => 'CSS třída kontejneru',
      'wrapper_css_placeholder' => 'form-group',

      'field_css' => 'CSS třida pole',
      'field_css_placeholder' => 'form-control',

      'label_css' => 'CSS třída popisku (label)',
      'label_css_placeholder' => '',

      'field_validation' => 'Validační pravidla pole',
      'field_validation_comment' => 'Povolí nastavení vlastních validačních pravidel',

      'validation' => 'Pravidlo',
      'validation_prompt' => 'Přidat pravidlo',

      'validation_type' => 'Typ',

      'validation_error' => 'Chybová zpráva',
      'validation_error_placeholder' => 'Prosím vložte správná data.',
      'validation_error_comment' => 'Chybová hláška, která se zobrazí u pole',

      'validation_custom_type' => 'Název validačního pravidla',
      'validation_custom_type_comment' => 'Vložte název pravidla třídy Validator (např. regex, boolean, ...).<br>Přehled <a href="https://octobercms.com/docs/services/validation#available-validation-rules" target="_blank">validačních pravidel</a>.',
      'validation_custom_type_placeholder' => 'regex',

      'validation_custom_pattern' => 'Podmínka validačního pravidla',
      'validation_custom_pattern_comment' => 'Nechte prázdné nebo doplňte podmínku pravidla (toto je pravá část zápisu validačního pravidla za dvojtečkou - např. [abc] pro pravidlo regex).',
      'validation_custom_pattern_placeholder' => "/^[0-9]+$/",

      'custom' => 'Vlastní pole',
      'custom_description' => 'Vlastní pole s validačními pravidly',

      'add_values_prompt' => 'Přidat hodnoty',
      'field_value_id' => 'ID hodnoty',
      'field_value_content' => 'Obsah',
    ],

    'form_field_types' => [
      'text' => 'Text',
      'email' => 'Email',
      'textarea' => 'Textarea',
      'checkbox' => 'Checkbox',
      'dropdown' => 'Výběr (dropdown)',
    ],

    'form_field_validation' => [
      'select' => '--- Vyberte pravidlo ---',
      'required' => 'Vyžadováno',
      'email' => 'Email',
      'numeric' => 'Číslo',
      'custom' => 'Vlastní pravidlo',
    ],

    'email' => [
      'address_from' => 'Adresa OD',
      'address_from_placeholder' => 'john.doe@domain.com',

      'address_from_name' => 'Jméno odesílatele',
      'address_from_name_placeholder' => 'John Doe',

      'subject' => 'Předmět emailu',
      'subject_comment' => 'Nastavte pouze pokud chcete přepsat předmět definovaný v šabloně (Nastavení > E-mailové šablony).',

      'template' => 'Šablona emailu',
      'template_comment' => 'Kód emailové šablony vytvořené v Nastavení > E-mailové šablony. Nechte prázdné pro výchozí šablonu: janvince.smallcontactform::mail.autoreply.',

      'allow_email_queue' => 'Řadit do fronty',
      'allow_email_queue_comment' => 'Přidat emaily do fronty místo okamžitého odeslání. Musíte ale nejdříve správně nakonfigurovat frontu systému OctoberCMS!',

      'allow_notifications' => 'Povolit odesílání upozornění',
      'allow_notifications_comment' => 'Odesílat upozornění, pokud někdo odešle formulář.',

      'notification_address_to' => 'Upozornění posílat na adresu:',
      'notification_address_to_comment' => 'Jedna emailová adresa nebo seznam adres oddělených čárkami',
      'notification_address_to_placeholder' => 'notifications@domain.com',

      'notification_address_from_form' => 'Nastavit adresu Od na email z formuláře (NEMUSÍ PODPOROVAT váš emailový systém!)',
      'notification_address_from_form_comment' => 'Nastaví u odesílaného upozornění adresu Od (From) na tu, která byla zadána ve formuláři (sloupec email musí mít nastavenou vazbu).',

      'allow_autoreply' => 'Povolit automatickou odpověď',
      'allow_autoreply_comment' => 'Poslat automatickou odpověď odesílateli formuláře',

      'autoreply_name_field' => 'Pole formuláře, které obsahuje JMÉNO odesílatele',
      'autoreply_name_field_empty_option' => '-- Vyberte --',
      'autoreply_name_field_comment' => 'Pole typu Text.',

      'autoreply_email_field' => 'Pole formuláře, které obsahuje ADRESU odesílatele',
      'autoreply_email_field_empty_option' => '-- Vyberte --',
      'autoreply_email_field_comment' => 'Pole typu Email.',

      'autoreply_message_field' => 'Pole formuláře, které obsahuje ZPRÁVU',
      'autoreply_message_field_empty_option' => '-- vyberte --',
      'autoreply_message_field_comment' => 'Pole typu Textarea nebo Text.',

      'notification_template' => 'Šablona notifikačního emailu',
      'notification_template_comment' => 'Kód emailové šablony vytvořené v Nastavení > E-mailové šablony. Nechte prázdné pro výchozí šablonu: janvince.smallcontactform::mail.notification.',

    ],

    'antispam' => [
      'add_antispam' => 'Přidat pasivní ochranu proti spamu',
      'add_antispam_comment' => 'Přidá jednoduchou ale efektivní pasivní ochranu proti robotům (více informací v souboru README.md)',

      'antispam_delay' => 'Zpoždění formuláře (s)',
      'antispam_delay_comment' => 'Test na příliš rychlé odeslání formuláře (většinou roboty)',
      'antispam_delay_placeholder' => '3',

      'antispam_label' => 'Popisek (label) antispamového pole',
      'antispam_label_comment' => 'Popisek bude viditelný pouze na prohlížečích bez podpory JavaScriptu',
      'antispam_label_placeholder' => 'Prosím vymažte toto pole',

      'antispam_error_msg' => 'Chybová zprávy',
      'antispam_error_msg_comment' => 'Zpráva, která se zobrazí, pokud se aktivuje pasivní antispam',
      'antispam_error_msg_placeholder' => 'Prosím vymažte obsah tohoto pole!',

      'antispam_delay_error_msg' => 'Chybová zprávy při rychlém odeslání',
      'antispam_delay_error_msg_comment' => 'Zpráva, která se zobrazí při příliš rychlém odeslání formuláře',
      'antispam_delay_error_msg_placeholder' => 'Příliš rychlé odeslání formuláře! Prosím zkuste to za pár vteřin znovu!',

      'add_google_recaptcha' => 'Přidat Google reCaptcha',
      'add_google_recaptcha_comment' => 'Přidá reCaptcha do kontaktního formuláře (více informací v souboru README.md). <br>API klíče můžete získat na <a href="https://www.google.com/recaptcha/admin#list" target="_blank">stránce Google reCaptcha</a>.',

      'google_recaptcha_version' => 'Verze Google reCaptcha',
      'google_recaptcha_version_comment' => 'Zvolte verzi reCaptcha widgetu.<br>Více informací naleznete na <a href="https://developers.google.com/recaptcha/docs/versions" target="_blank">webu Google reCaptcha</a>.',

      'google_recaptcha_versions' => [
        'v2checkbox' => 'reCaptcha V2 zaškrtávací pole',
        'v2invisible' => 'reCaptcha V2 neviditelná',
      ],

      'google_recaptcha_site_key' => 'Site key',
      'google_recaptcha_site_key_comment' => 'Vložte svůj "site key"',

      'google_recaptcha_secret_key' => 'Secret key',
      'google_recaptcha_secret_key_comment' => 'Vložte svůj "secret key"',

      'google_recaptcha_wrapper_css' => 'CSS třída kontejneru reCaptcha boxu',
      'google_recaptcha_wrapper_css_comment' => 'CSS třída kontejneru, ve kterém je vložený box reCaptcha',
      'google_recaptcha_wrapper_css_placeholder' => 'form-group',

      'google_recaptcha_error_msg' => 'Chybová zpráva',
      'google_recaptcha_error_msg_comment' => 'Zpráva, která se zobrazí, pokud dojde chybě při ověření reCAPTCHA.',
      'google_recaptcha_error_msg_placeholder' => 'Chyba při ověření pomocí Google reCAPTCHA!',

      'google_recaptcha_scripts_allow' => 'Automaticky přidat Google reCAPTCHA sckript',
      'google_recaptcha_scripts_allow_comment' => 'Vloží odkaz na JavaScriptový soubor potřebný pro fungování reCAPTCHA.',

      'google_recaptcha_locale_allow' => 'Povolit detekci jazyka',
      'google_recaptcha_locale_allow_comment' => 'Přidá k reCAPTCHA skriptu kód jazyka stránky, takže ověřovací box bude mluvit jazykem návštěvníka webu.',

      'add_ip_protection' => 'Testovat IP adresu odesílatele',
      'add_ip_protection_comment' => 'Nepovolí příliš mnoho odeslání formuláře z jedné IP adresy',

      'add_ip_protection_count' => 'Maximální počet odeslání během jednoho dne',
      'add_ip_protection_count_comment' => 'Počet povolených odeslání formuláře z jedné IP adresy během jednoho dne',
      'add_ip_protection_count_placeholder' => '3',

      'add_ip_protection_error_get_ip' => 'Nepodařilo se určit vaši IP adresu!',

      'add_ip_protection_error_too_many_submits' => 'Chybová zpráva při překročení počtu odeslání',
      'add_ip_protection_error_too_many_submits_comment' => 'Zpráva, kterou obdrží uživatel při překročení limitu počtu odeslání formuláře',
      'add_ip_protection_error_too_many_submits_placeholder' => 'Byl překročen limit odeslání formuláře během jednoho dne!',

      'disabled_extensions' => 'Zakázaná rozšíření',
      'disabled_extensions_comment' => 'Nastavení ze záložky Soukromí zkusobila vypnutí těchto rozšíření',
    ],

    'mapping' => [

      'hint' => [
        'title' => 'Proč vazby na sloupce?',
        'content' => '
        <p>Můžete vytvořit libovolný formulář s vlastními poli a jejich typy.</p>
        <p>Systém zapíše do databáze všechna odeslaná data formuláře, ale pro Přehled zpráv jsou zvlášť ukládána pole Jméno, Email a Zpráva.</p>
        <p>Proto je nutné identifikovat pro tyto sloupce odpovídající pole ve vašem formuláři.</p>
        <p><em>Vytvořené vazby jsou použité i při odesílání automatických odpovědí, kde je nutné vazba alespoň na pole Email.</em></p>
        ',
      ],

      'warning' => [
        'title' => 'Nevidíte vaše formulářová pole?',
        'content' => '
        <p>Pokud zde nevidíte svá formulářová pole, klikněte dole na tlačítko Uložit a pak obnovte stránku (F5 nebo Ctr+R / Cmd+R).</p>
        ',
      ],

    ],
    
    'privacy' => [
      'disable_messages_saving' => 'Zakázat ukládání zpráv',
      'disable_messages_saving_comment' => 'Pokud je zaškrtnuto, odeslané zprávy se nebudou ukládat do databáze.<br><strong>Tato volba zároveň zakáže použití IP ochrany!</strong>',
      'disable_messages_saving_comment_section' => '<div class="callout fade in callout-danger no-subheader"><div class="header"><i class="icon-warning"></i><h3>Ujistěte se, že máte povoleny notifikační emaily, jinak nebudete mít žádná data z odeslaných formulářů!</h3></div></div>',
    ],

    'tabs' => [
      'form' => 'Formulář',
      'buttons' => 'Odesílací tlačítko',
      'form_fields' => 'Pole formuláře',
      'mapping' => 'Vazby sloupců',
      'email' => 'Email',
      'antispam' => 'Antispam',
      'privacy' => 'Soukromí'      
    ],

  ],

  'components' => [

      'groups' => [

          'hacks' => 'Hacks',
          'override_form' => 'Přepsat nastavení formuláře',
          'override_notifications' => 'Přepsat nastavení notifikací',
          'override_autoreply' => 'Přepsat nastavení automatických odpovědí',
          'override' => 'Přepsat nastavení',


      ],
      'properties' => [

          'disable_notifications' => 'Zakázat odesílání notifikačních emailů',
          'disable_notifications_comment' => 'Zakáže odeslání notifikáčních emailů (bez ohledu na systémová nastavení formuláře)',

          'form_description' => 'Popisek formuláře',
          'form_description_comment' => 'Volitelně můžete přidat popisek formuláře, který se uloží společně s odeslanými daty do seznamu zpráv. Můžete použít i {{ :slug }}.',

          'disable_fields' => 'Zakázat pole',
          'disable_fields_comment' => 'Vložte názvy polí oddělené trubkou (např. name|message|phone)',

          'send_btn_label' => 'Popisek odesílacího tlačítka',
          'send_btn_label_comment' => 'Přepíše výchozí text odesílacího tlačítka',

          'form_success_msg' => 'Zpráva po úspěšném odeslání',
          'form_success_msg_comment' => 'Přepíše výchozí zprávu zobrazenou po úspěšném odeslání formuláře',

          'form_error_msg' => 'Zpráva po chybě při odeslání',
          'form_error_msg_comment' => 'Přepíše výchozí zprávu zobrazenou po neúspěšném odeslání formuláře',

          'notification_address_to' => 'Adresa KOMU',
          'notification_address_to_comment' => 'Přepíše adresu KOMU v notifikačním emailu',

          'notification_address_from' => 'Adresa OD',
          'notification_address_from_comment' => 'Přepíše adresu OD v notifikačním emailu',

          'notification_address_from_name' => 'Jméno pro adresu OD',
          'notification_address_from_name_comment' => 'Přepíše jméno zobrazené spolu s emailem OD',

          'notification_template' => 'Šablona notifikace',
          'notification_template_comment' => 'Přepíše šablonu notifikačního emailu',

          'disable_autoreply' => 'Zakázat notifikace',
          'disable_autoreply_comment' => 'Zakáže odesílání notifikací',

          'autoreply_address_from' => 'Adresa OD',
          'autoreply_address_from_comment' => 'Přepíše adresu od v automatické odpovědi po odeslání formuláře',

          'autoreply_address_from_name' => 'Jméno pro adresu OD',
          'autoreply_address_from_name_comment' => 'Přepíše jméno zobrazené spolu s emailem OD',

          'autoreply_template' => 'Šablona automatické odpovědi',
          'autoreply_template_comment' => 'Přepíše šablonu emailu autoamtické odpovědi',

      ]

  ],

];
