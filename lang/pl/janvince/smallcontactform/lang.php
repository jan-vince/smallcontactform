<?php

return [
    'plugin' => [
        'name' => 'Formularz kontaktowy',
        'description' => 'Kreator prostego formularza kontaktowego',
        'category' => 'Small plugins',
    ],

    'permissions' => [
        'access_messages' => 'Przeglądaj wiadomości',
        'access_settings' => 'Zarządzaj ustawieniami',
        'delete_messages' => 'Usuwaj zapisane wiadomości',
        'export_messages' => 'Eksportuj wiadomości',
    ],

    'navigation' => [
        'main_label' => 'Formularz kontaktowy',
        'messages' => 'Wiadomości',
    ],

    'controller' => [

        'contact_form' => [
            'name' => 'Formularz kontaktowy',
            'description' => 'Dodaj formularz kontaktowy do strony',
            'no_fields' => 'Najpierw dodaj pola formularza w panelu administracyjnym (Ustawienia -> Small plugins -> Formularz kontktowy)...',
        ],

        'filter' => [
            'date' => 'Zakres dat',
        ],

        'scoreboard' => [
            'records_count' => 'Wiadomości',
            'latest_record' => 'Ostatnia wiadomość od',
            'new_count' => 'Nowe',
            'new_description' => 'Wiadomości',
            'read_count' => 'Przeczytane',
            'all_count' => 'Wszystkie',
            'all_description' => 'Wiadomości',
            'settings_btn' => 'Ustawienia formularza',
            'mark_read' => 'Oznacz jako przeczytane',
            'mark_read_confirm' => 'Czy na pewno oznaczyć wybrane wiadomości jako przeczytane?',
            'mark_read_success' => 'Oznaczono jako przeczytane.',
        ],

        'preview' => [
            'record_not_found' => 'Nie znaleziono wiadomości!',
        ],

    ],

    'models' => [

        'message' => [

            'columns' => [
                'id' => 'ID',
                'datetime' => 'Data i godzina',
                'form_data' => 'Dane formularza',
                'name' => 'Imię i nazwisko',
                'email' => 'Email',
                'message' => 'Wiadomość',
                'new_message' => 'Status',
                'new' => 'Nowa',
                'read' => 'Przeczytana',
                'remote_ip' => 'Adres IP wysyłającego',
                'form_alias' => 'Alias',
                'form_description' => 'Opis',
                'created_at' => 'Utworzono',
                'updated_at' => 'Zaktualizowano',
            ]

        ],


    ],

    'controllers' => [

        'messages' => [

            'list_title' => 'Wiadomości',
            'preview' => 'Podgląd',
            'preview_title' => 'Wiadomość z formularza kontaktowego',
            'preview_date' => 'Data otrzymania:',
            'preview_content_title' => 'Zawartość:',
            'remote_ip' => 'Wysłano z adresu IP',
            'export' => 'Eksportuj',
        ],

        'index' => [
            'unauthorized' => 'Nie masz uprawnień aby wyświetlić tą stroną',
        ],

    ],

    'mail' => [

        'templates' => [

            'autoreply' => 'Wiadomość automatycznej odpowiedzi (Angielski)',
            'autoreply_cs' => 'Wiadomość automatycznej odpowiedzi (Czeski)',

            'notification' => 'Wiadomość powiadamiająca (Angielski)',
            'notification_cs' => 'Wiadomość powiadamiająca (Czeski)',

        ]

    ],

    'reportwidget' => [

        'partials' => [

            'messages' => [
                'label' => 'Formularz kontaktowy - Statystyki wiadomości',
                'title' => 'Statystyki wiadomości',
                'messages_all' => 'Wszystkie',
                'messages_new' => 'Nowe',
                'messages_read' => 'Przeczytane',
            ],

            'new_message' => [
                'label' => 'Formularz Kontaktowy - Nowe wiadomości',
                'title' => 'Nowe wiadomości',
                'link_text' => 'Kliknij, aby pokazać listę wiadomości',
            ],

        ],

    ],

    'settings' => [

        'form' => [
            'css_class' => 'Klasa CSS formularza',

            'use_placeholders' => 'Użyj tekstów zastępczych (Placeholder)',
            'use_placeholders_comment' => 'Teksty zastępcze będą wyświetlane zamiast etykiet pól. (Etykiety otrzymają styl display: none)',

            'disable_browser_validation' => 'Wyłącz domyślną walidację przeglądarki',
            'disable_browser_validation_comment' => 'Nie zezwalaj na wbudowane w przeglądarkę sprawdzanie poprawności i wyskakujące okienka.',

            'success_msg' => 'Wiadomość o poprawnym wysłaniu formularza',
            'success_msg_placeholder' => 'Twoja wiadomość została wysłana.',

            'error_msg' => 'Wiadomość o niepoprawnym wysłaniu formularza',
            'error_msg_placeholder' => 'Wystąpił błąd podczas wysyłania Twojej wiadomości!',

            'allow_ajax' => 'Włącz AJAX',
            'allow_ajax_comment' => 'Zezwól na asynchroniczny formularz AJAX razem ze wsparciem dla przeglądarek nieobsługujących JavaScript.',

            'allow_confirm_msg' => 'Zapytaj o potwierdzenie przed wysłaniem formularza',
            'allow_confirm_msg_comment' => 'Dodaje okno dialogowe potwierdzenia przed wysłaniem',

            'send_confirm_msg' => 'Tekst potwierdzenia',
            'send_confirm_msg_placeholder' => 'Czy jesteś pewny?',

            'hide_after_success' => 'Ukryj formularz po pomyślnym wysłaniu',
            'hide_after_success_comment' => 'Pokaż tylko wiadomość o pomyślnym wysłaniu wiadomości bez formularza',

            'add_assets' => 'Dodaj pliki',
            'add_assets_comment' => 'Automatycznie dodaje niezbędne pliki CSS i JS (więcej na ten temat w pliku README.md)',

            'add_css_assets' => 'Dodaj pliki CSS',
            'add_css_assets_comment' => 'Dodaje wszystkie niezbędne pliki CSS',

            'add_js_assets' => 'Dodaj pliki JS',
            'add_js_assets_comment' => 'Dodaje wszystkie niezbędne pliki JS',
        ],

        'buttons' => [
            'send_btn_text' => 'Tekst przycisku wyślij',
            'send_btn_text_placeholder' => 'Wyślij',

            'send_btn_css_class' => 'Klasa CSS przycisku wyślij',
            'send_btn_css_class_placeholder' => 'btn btn-primary',

            'send_btn_wrapper_css' => 'Klasa CSS kontenera przycisku wyślij',
            'send_btn_wrapper_css_placeholder' => 'form-group',
        ],

        'redirect' => [

            'allow_redirect' => 'Przekieruj po wysłaniu',
            'allow_redirect_comment' => 'Przekierowuje na inną stronę po wysłaniu formularza',

            'redirect_url' => 'Adres URL strony przekierowania',
            'redirect_url_comment' => 'Wprowadź adres URL strony (np. /contact/thank-you)',
            'redirect_url_placeholder' => '/contact/thank-you',

            'redirect_url_external' => 'Zewnętrzny adres URL',
            'redirect_url_external_comment' => 'Ten adres URL wskazuje na zewnętrzną domenę (np. http://www.domain.com)',

        ],

        'form_fields' => [
            'prompt' => 'Dodaj nowe pole formularza',

            'name' => 'NAZWA POLA',
            'name_comment' => 'Małe litery bez znaków specjalnych (np. name, email, home_address, ...)',

            'type' => 'Rodzaj pola',

            'label' => 'Etykieta',
            'label_placeholder' => 'Imię i nazwisko',

            'field_styling' => 'Niestandardowa klasa CSS',
            'field_styling_comment' => 'Zmień domyślne style (Bootstrap)',

            'autofocus' => 'Automatyczny fokus',
            'autofocus_comment' => 'Automatycznie ustaw fokus na to pole',

            'wrapper_css' => 'Klasa CSS kontenera',
            'wrapper_css_placeholder' => 'form-group',

            'field_css' => 'Klasa CSS pola',
            'field_css_placeholder' => 'form-control',

            'label_css' => 'Klasa CSS etykiety',
            'label_css_placeholder' => 'control-label',

            'field_validation' => 'Walidacja',
            'field_validation_comment' => 'Dodaj reguły walidacji',

            'validation' => 'Walidacja',
            'validation_prompt' => 'Dodaj regułę walidacji',

            'validation_type' => 'Reguła walidacji',

            'validation_error' => 'Komunikat błędu walidacji',
            'validation_error_placeholder' => 'Wprowadź poprawne dane.',
            'validation_error_comment' => 'Komunikat wyświetlany, gdy pole nie przejdzie walidacji',

            'validation_custom_type' => 'Validation rule name',
            'validation_custom_type_comment' => 'Wprowadź nazwę reguły walidatora (eg. regex, boolean, ...).<br>See <a href="https://octobercms.com/docs/services/validation#available-validation-rules" target="_blank">reguły walidacji</a>.',
            'validation_custom_type_placeholder' => 'regex',

            'validation_custom_pattern' => 'Wzorzec reguły walidacji',
            'validation_custom_pattern_comment' => 'Pozostaw puste lub wprowadź niestandardowy wzorzec reguły (prawa część reguły znajdująca się po dwukropku - np. [abc] dla reguły regex)',
            'validation_custom_pattern_placeholder' => "/^[0-9]+$/",

            'custom' => 'Pole niestandardowe',
            'custom_description' => 'Niestandardowe pole z opcją walidacji',

            'add_values_prompt' => 'Dodaj opcje',
            'field_value_id' => 'Identyfikator opcji',
            'field_value_content' => 'Tekst opcji',

        ],

        'form_field_types' => [
            'text' => 'Tekst',
            'email' => 'Email',
            'textarea' => 'Pole tekstowy',
            'checkbox' => 'Pole wyboru',
            'dropdown' => 'Lista rozwijalna',
            'file' => 'File',
            'custom_code' => 'Custom code',
            'custom_content' => 'Custom content',
        ],

        'form_field_validation' => [
            'select' => '--- Wybierz regułę walidacji ---',
            'required' => 'Wymagane',
            'email' => 'Email',
            'numeric' => 'Numeryczne',
            'custom' => 'Reguła niestandardowa',
        ],

        'email' => [
            'address_from' => 'Z adresu',
            'address_from_placeholder' => 'example@domain.com',

            'address_from_name' => 'Nazwa wyświetlana w polu "Od"',
            'address_from_name_placeholder' => 'Jan Nowak',

            'subject' => 'Temat wiadomości',
            'subject_comment' => 'Ustaw tylko wtedy, gdy chcesz aby był inny niż zdefiniowano w Ustawienia > Mail > Szablony wiadomości email',

            'template' => 'Szablon wiadomości',
            'template_comment' => 'Kod szablonu wiadomości email utworzony w Ustawienia > Mail > Szablony wiadomości email. Pozostaw puste dla domyślnego szablonu: janvince.smallcontactform::mail.autoreply.',

            'allow_email_queue' => 'Kolejkowanie wiadomości',
            'allow_email_queue_comment' => 'Dodawaj wiadomości do kolejki zamiast wysyłać je natychmiastowo. Pamiętaj, najpierw musisz skonfigurować kolejkę OctoberCMS!',

            'allow_notifications' => 'Wysyłaj powiadomienia',
            'allow_notifications_comment' => 'Wyślij powiadomienie zaraz po wysłaniu formularza',

            'notification_address_to' => 'Wyślij powiadomienie na adres/adresy',
            'notification_address_to_comment' => 'Jeden adres email, lub lista oddzielona przecinkami',
            'notification_address_to_placeholder' => 'notifications@domain.com',

            'notification_address_from_form' => 'Wymuś zawartość pola "Od" powiadomienia (NIE WSPIERANE przez wszystkie systemy email)',
            'notification_address_from_form_comment' => 'Ustaw adres, z którego wysyłane jest powiadomienie na adres email podany w formularzu kontaktowym (pole musi być ustawione w odwzorowaniu pól).',

            'allow_autoreply' => 'Automatyczna odpowiedź',
            'allow_autoreply_comment' => 'Wyślij kopię wiadomości do autora',

            'autoreply_name_field' => 'Pole NAZWA',
            'autoreply_name_field_empty_option' => '-- Wybierz --',
            'autoreply_name_field_comment' => 'Musi być typu Tekst.<br><em>Zapisz i odśwież tą stronę jeśli nie widzisz pól.</em>',

            'autoreply_email_field' => 'Pole EMAIL',
            'autoreply_email_field_empty_option' => '-- Wybierz --',
            'autoreply_email_field_comment' => 'Musi być typu Email.<br><em>Zapisz i odśwież tą stronę jeśli nie widzisz pól.</em>',

            'autoreply_message_field' => 'Pole WIADOMOŚĆ',
            'autoreply_message_field_empty_option' => '-- Wybierz --',
            'autoreply_message_field_comment' => 'Musi być typu Pole tekstowe lub Tekst.<br><em>Zapisz i odśwież tą stronę jeśli nie widzisz pól.</em>',

            'notification_template' => 'Szablon wiadomości powiadomienia',
            'notification_template_comment' => 'Kod szablonu wiadomości email utworzony w Ustawienia > Mail > Szablony wiadomości email. Pozostaw puste dla domyślnego szablonu: janvince.smallcontactform::mail.notification.',

        ],

        'antispam' => [
            'add_antispam' => 'Dodaj pasywną ochronę antyspamową',
            'add_antispam_comment' => 'Dodaj prostą, ale skuteczną pasywną kontrolę antyspamową (więcej informacji w pliku README.md)',

            'antispam_delay' => 'Opóźnienie ochrony antyspamowej (s)',
            'antispam_delay_comment' => 'Zabezpieczenia w postaci opóźnienia podczas wysyłania dużej ilości wiadomości (zwykle przez roboty)',
            'antispam_delay_placeholder' => '3',

            'antispam_label' => 'Etykieta pola ochrony antyspamowej',
            'antispam_label_comment' => 'Etykieta będzie widoczna tylko dla przeglądarek, które nie obsługują JavaScript',
            'antispam_label_placeholder' => 'Wyczyść to pole w celu wysłania wiadomości',

            'antispam_error_msg' => 'Komunikat o błędzie - ochrona antyspamowa',
            'antispam_error_msg_comment' => 'Komunikat, który zostanie wyświetlony, gdy uruchomi się ochrona antyspamowa',
            'antispam_error_msg_placeholder' => 'Musisz wyczyścić to pole, aby wysłać wiadomość!',

            'antispam_delay_error_msg' => 'Komunikat o błędzie - opóźnienie',
            'antispam_delay_error_msg_comment' => 'Komunikat, który zostanie wyświetlony, gdy użytkownik wyśle wiadomość zbyt szybko',
            'antispam_delay_error_msg_placeholder' => 'Wiadomość wysłana zbyt szybko! Poczekaj chwilę, a następnie spróbuj ponownie.',

            'add_google_recaptcha' => 'Dodaj Google reCaptcha',
            'add_google_recaptcha_comment' => 'Dodaj reCaptcha do formularza kontaktowego (więcej informacji w pliku README.md).<br>Możesz uzyskać klucze API na <a href="https://www.google.com/recaptcha/admin#list" target="_blank">stronie Google reCaptcha</a>.',

            'google_recaptcha_site_key' => 'Klucz strony',
            'google_recaptcha_site_key_comment' => 'Wpisz swój kod strony',

            'google_recaptcha_secret_key' => 'Sekretny klucz',
            'google_recaptcha_secret_key_comment' => 'Wpisz swój sekretny klucz',

            'google_recaptcha_wrapper_css' => 'Klasa CSS kontenera reCaptcha',
            'google_recaptcha_wrapper_css_comment' => 'Klasa CSS kontenera wokół pola reCaptcha',
            'google_recaptcha_wrapper_css_placeholder' => 'form-group',

            'google_recaptcha_error_msg' => 'Komunikat błędu',
            'google_recaptcha_error_msg_comment' => 'Komunikat, który pokaże się, gdy reCAPTCHA zwróci błąd.',
            'google_recaptcha_error_msg_placeholder' => 'Google reCAPTCHA validation error!',

            'google_recaptcha_scripts_allow' => 'Automatycznie dodaj niezbędne skrypt JS',
            'google_recaptcha_scripts_allow_comment' => 'Dodaj skrypty JS do twojej strony',

            'google_recaptcha_locale_allow' => 'Zezwól na wykrywanie ustawień regionalnych',
            'google_recaptcha_locale_allow_comment' => 'Spowoduje to dodanie bieżących ustawień regionalnych do skryptu reCAPTCHA, tak że będzie ona przetłumaczona.',

            'add_ip_protection' => 'Sprawdzaj adres IP wysyłającego',
            'add_ip_protection_comment' => 'Nie zezwalaj na zbyt dużo wiadomości z jednego adresu IP',

            'add_ip_protection_count' => 'Maksymalna liczba wiadomości na dzień',
            'add_ip_protection_count_comment' => 'Maksymalna liczba wiadomości możliwa do wysłania z jednego adresu IP na dzień',
            'add_ip_protection_count_placeholder' => '3',

            'add_ip_protection_error_get_ip' => 'Nie udało się ustalić Twojego adresu IP',

            'add_ip_protection_error_too_many_submits' => 'Komunikat błędu - za dużo wiadomości',
            'add_ip_protection_error_too_many_submits_comment' => 'Komunikat, który zostanie pokazany użytkownikowi',
            'add_ip_protection_error_too_many_submits_placeholder' => 'Otrzymaliśmy dzisiaj zbyt wiele wiadomości z jednego adresu IP. Spróbuj ponownie jutro.',

            'disabled_extensions' => 'Wyłączone rozszerzenia',
            'disabled_extensions_comment' => 'Ustawienia na zakładce Prywatność wyłączyły te rozszerzenia',

        ],

        'mapping' => [

            'hint' => [
                'title' => 'Dlaczego odwzorowywanie pól?',
                'content' => '
        <p>Możesz zbudować niestandardowy formularz z własnymi nazwami i typami pól.</p>
        <p>System zapisuje wszystkie dane formularze w bazie danych. W celu szybkiego podglądu kolumny NAZWA, EMAIL i WIADOMOŚĆ są widoczne osobno na liście wiadomości.</p>
        <p>Musisz więc pomóc systemowi w identyfikacji tych kolumn poprzez odwzorowanie pól formularza.</p>
        <p><em>Odwzorowania są również używane przez system automatycznej odpowiedzi na wiadomości, w których ważne jest przynajmniej pole EMAIL.</em></p>
        ',
            ],

            'warning' => [
                'title' => 'Nie możesz wybrać pól?',
                'content' => '<p>Jeśli nie widzisz pól formularza wciśnij przycisk zapisz na dole strony a następnie odśwież stronę (F5 lub Ctrl + R / Cmd + R)</p>',
            ],

        ],

        'privacy' => [
            'disable_messages_saving' => 'Wyłącz zapisywanie wiadomości',
            'disable_messages_saving_comment' => 'Żadne dane nie zostaną zapisane w liście wiadomości. <strong>To ustawienie wyłączy również ochronę na podstawie adresu IP!</strong>',
            'disable_messages_saving_comment_section' => '<div class="callout fade in callout-danger no-subheader"><div class="header"><i class="icon-warning"></i><h3>Pamiętaj, aby włączyć powiadomienia email! W przeciwnym wypadku nie otrzymasz żadnych danych z formularza.</h3></div></div>',
        ],

        'tabs' => [
            'form' => 'Formularz',
            'buttons' => 'Przycisk wyślij',
            'form_fields' => 'Pola',
            'mapping' => 'Odwzorowanie pól',
            'email' => 'Email',
            'antispam' => 'Ochrona antyspamowa',
            'privacy' => 'Prywatność'
        ],

    ],

    'components' => [

        'groups' => [

            'hacks' => 'Hacki',

        ],
        'properties' => [

            'disable_notifications' => 'Wyłącz powiadomienia e-mail',
            'disable_notifications_comment' => 'Spowoduje wyłączenie powiadomień e-mail (nadpisuje ustawienia globalne)',

            'form_description' => 'Opis formularza',
            'form_description_comment' => 'Możesz dodać opcjonalny opis formularza, który zostanie zapisany wraz z danymi wysłanymi przez formularz. Może także użyć {{ :slug }}.',

        ]

    ],

];
