<?php

return [
  'plugin' => [
    'name' => 'Lomake',
    'description' => 'Yksinkertainen lomaketyökalu',
    'category' => 'Small plugins',
  ],

  'permissions' => [
    'access_messages' => 'Pääsy viestilistaan',
    'access_settings' => 'Hallitse ylläpidon asetuksia',
    'delete_messages' => 'Poista tallennetut viestit',
    'export_messages' => 'Vie viestit',
  ],

  'navigation' => [
    'main_label' => 'Lomake',
    'messages' => 'Viestit',
  ],

  'controller' => [

    'contact_form' => [
      'name' => 'Yhteydenottolomake',
      'description' => 'Lisää yhteydenottolomake sivulle',
      'no_fields' => 'Ole hyvä ja lisää muutama kenttä ylläpidossa. (Asetukset > Yhteydenottolomake > Kentät)...',
    ],

    'filter' => [
      'date' => 'Päivämääräväli',
    ],

    'scoreboard' => [
      'records_count' => 'Viestit',
      'latest_record' => 'Viimeisimmät',
      'new_count' => 'Uusi',
      'new_description' => 'Viestit',
      'read_count' => 'Luetut',
      'all_count' => 'Yhteensä',
      'all_description' => 'Viestit',
      'settings_btn' => 'Lomakeasetukset',
      'mark_read' => 'Merkitse luetuksi',
      'mark_read_confirm' => 'Haluatko varmasti merkitä viestin luetuksi`?',
      'mark_read_success' => 'Viesti merkitty luetuksi.',
    ],

    'preview' => [
      'record_not_found' => 'Viestiä ei löytynyt!',
    ],

  ],

  'models' => [

    'message' => [

      'columns' => [
        'id' => 'ID',
        'datetime' => 'PVM ja aika',
        'form_data' => 'Lomakedata',
        'name' => 'Nimi',
        'email' => 'Sähköposti',
        'message' => 'Viesti',
        'new_message' => 'Tila',
        'new' => 'Uusi',
        'read' => 'Luettu',
        'remote_ip' => 'Lähettjän IP',
        'form_alias' => 'Alias',
        'form_description' => 'Kuvaus',
        'created_at' => 'Luotu',
        'updated_at' => 'Päivitetty',
        'url' => 'URL',
        'files' => 'Tiedostot',
        'form_notes' => 'Muistiinpanot',
      ]

    ],


  ],

  'controllers' => [

    'messages' => [

      'list_title' => 'Viestit',
      'preview' => 'Esikatselu',
      'preview_title' => 'Yhteydenottolomakkeen viesti',
      'preview_date' => 'Alkaen pvm:',
      'preview_content_title' => 'Sisältö:',
      'remote_ip' => 'IP-osoite',
      'export' => 'Vie',
    ],

    'index' => [
      'unauthorized' => 'Ei pääsyä',
    ],

  ],

  'mail' => [

    'templates' => [

      'autoreply' => 'Form autoreply message (English)',
      'autoreply_fi' => 'Yhteydenoton automaattisen vastauksen viesti (Finnish)',

      'notification' => 'Form notification message (English)',
      'notification_fi' => 'Yhteydenoton notifikaatioviesti (Finnish)',

    ]

  ],

  'reportwidget' => [

    'partials' => [

      'messages' => [
        'label' => 'Lomake - Viestitilastot',
        'title' => 'Viestitilastot',
        'messages_all' => 'Kaikki',
        'messages_new' => 'Uusi',
        'messages_read' => 'Luettu',
      ],

      'new_message' => [
        'label' => 'Lomake - Uusi viesti',
        'title' => 'Uudet viestit',
        'link_text' => 'Klikkaa viestilistalle',
      ],

    ],

  ],

  'settings' => [

    'form' => [

      'css_class' => 'Lomakkeen CSS-luokka',

      'use_placeholders' => 'Käytä esimerkkitekstiä',
      'use_placeholders_comment' => 'Esimerkkiteksti näytetään kenttien otsikoiden sijasta',

      'disable_browser_validation' => 'Poista selaimen validointi käytöstä',
      'disable_browser_validation_comment' => 'Älä salli selaimen sisäänrakennettua validointia ja ponnahdusikkunoita.',

      'success_msg' => 'Onnistuneen lähetyksen viesti',
      'success_msg_placeholder' => 'Lomake lähetetty onnistuneesti.',

      'error_msg' => 'Viesti lähetyksen epäonnistuessa',
      'error_msg_placeholder' => 'Lomaketta ei voitu lähettää!',

      'allow_ajax' => 'Salli AJAX',
      'allow_ajax_comment' => 'Salli AJAX oletuksena selaimille, joissa JacaSkriptiä ei ole',

      'allow_confirm_msg' => 'Kysy vahvistus ennen lomakkeen lähetystä',
      'allow_confirm_msg_comment' => 'Lisää vahvistusikkuna ennen lomakkeen lähetystä',

      'send_confirm_msg' => 'Vahvistusteksti',
      'send_confirm_msg_placeholder' => 'Oletko varma?',

      'hide_after_success' => 'Piilota lomake onnistuneen lähetyksen jälkeen',
      'hide_after_success_comment' => 'Näytä vain Lähetys onnistui -viesti ja piilota lomake',

      'add_assets' => 'Lisää kirjastot',
      'add_assets_comment' => 'Lisää automaattisesti tarvittavat CSS- ja JS-kirjastot (lue lisää README.md-tiedostosta)',

      'add_css_assets' => 'Lisää CSS-kirjasto',
      'add_css_assets_comment' => 'Kaikki tarvittavat tyylit sisällytetään',

      'add_js_assets' => 'Lisää JavaScript-kirjasto',
      'add_js_assets_comment' => 'Kaikki tarvittavat JavaScripts-kirjastot sisällytetään',

      'form_ga_event_success' => 'GA-tapahtuma onnistuneen lähetyksen jälkeen',

      'notes' => 'Muistiinpanot',
      'notes_comment' => 'Voit lisätä muistiinpanoja, joita näytetään viesteissä.',

    ],

    'sections' => [
      'ga_events' => 'Tapahtumat'
    ],

    'ga' => [
      'ga_success_event_allow' => 'Lähetystapahtyma onnistuneesta lähetyksestä',

      'ga_success_event_gtag' => 'Global tag, jota käytetään sivustolla',
      'ga_success_event_gtag_empty_option' => 'Valitse käytettävä tagi',
      'ga_success_event_gtag_ga' => 'analytics.js (old)',
      'ga_success_event_gtag_gtag' => 'gtag.js',

    ],

    'buttons' => [
      'send_btn_text' => 'Lähetä nappulan teksti',
      'send_btn_text_placeholder' => 'Lähetä',

      'send_btn_css_class' => 'Lähetä nappulan CSS-luokka',
      'send_btn_css_class_placeholder' => 'btn btn-primary',

      'send_btn_wrapper_css' => 'Lähetä nappulan wrapper CSS-luokka',
      'send_btn_wrapper_css_placeholder' => 'form-group',

    ],

    'redirect' => [

      'allow_redirect' => 'Edelleenohjaa lähetyksen jälkeen',
      'allow_redirect_comment' => 'Edelleenohjaa toiseen sivuun onnistuneen lähetyksen jälkeen',

      'redirect_url' => 'Sivun URL, johon ohjataan',
      'redirect_url_comment' => 'Lisää sivun URL-osoite (esim. /yhteystiedot/kiitos)',
      'redirect_url_placeholder' => '/yhteystiedot/kiitos',

      'redirect_url_external' => 'Ulkoinen URL-osoite',
      'redirect_url_external_comment' => 'Tämä on ulkoisen sivuston osoite (esim. http://www.domain.com)',

    ],

    'form_fields' => [
      'prompt' => 'Lisää uusi lomakekenttä',

      'name' => 'KENTÄN NIMI',
      'name_comment' => 'pienin kirjaimin, ei erikoismerkkejä (esim. nimi, sahkoposti, osoite_koti, ...)',

      'type' => 'Kentän tyyppi',

      'label' => 'Label',
      'label_placeholder' => 'Koko nimi',

      'field_styling' => 'Oma CSS-luokka',
      'field_styling_comment' => 'Vaihda oletus Bootstrap-tyyli',

      'autofocus' => 'Autofocus-kenttä',
      'autofocus_comment' => 'Tee tästä kentästä Autofocus',

      'wrapper_css' => 'Wrapper CSS-luokka',
      'wrapper_css_placeholder' => 'form-group',

      'field_css' => 'Field CSS-luokka',
      'field_css_placeholder' => 'form-control',

      'label_css' => 'Label CSS-luokka',
      'label_css_placeholder' => 'form-label',

      'field_validation' => 'Kentän validointi',
      'field_validation_comment' => 'Lisää kentän validointisäännöt',

      'validation' => 'Validointi',
      'validation_prompt' => 'Lisää validointi',

      'validation_type' => 'Validointisääntö',

      'validation_error' => 'Validoinnin virheilmoitus',
      'validation_error_placeholder' => 'Ole hyvä ja korjaa kentän tieto.',
      'validation_error_comment' => 'Virheviesti, joka näytetään epäonnistuneesta validoinnista',

      'validation_custom_type' => 'Validointisäännön nimi',
      'validation_custom_type_comment' => 'Anna validointisäännölle nimi (esim. regex, boolean, ...).<br>Katso <a href="https://octobercms.com/docs/services/validation#available-validation-rules" target="_blank">validointi säännöt</a>.',
      'validation_custom_type_placeholder' => 'regex',

      'validation_custom_pattern' => 'Validointisäännön pattern',
      'validation_custom_pattern_comment' => 'Jätä tyhjäksi tai anna oma pattern (tämä on oikean puoleinen osa Validaattorisäännön jälkeen kaksoispisteen perässä - esim. [abc], regex).',
      'validation_custom_pattern_placeholder' => "/^[0-9]+$/",

      'custom' => 'Oma kenttä',
      'custom_description' => 'Oma kenttä validointioptiolla',

      'add_values_prompt' => 'Lisää arvot',
      'field_value_id' => 'Kentän arvo ID',
      'field_value_content' => 'Kentän arvon sisältö',

      'hit_type' => 'Hit-tyyppi',
      'event_category' => 'Tapahtumakategoria',
      'event_action' => 'Tapahtuma toimenpide',
      'event_label' => 'Tapahtuma label',

      'custom_code' => 'Oma koodi',
      'custom_code_comment' => 'Tämä yliajaa kentän oletuskoodin. Käytä varoen!',
      'custom_code_twig' => 'Salli Twig',
      'custom_code_twig_comment' => 'Mikäli sallittu, Twig-markup parseroidaan.',
      
      'custom_content' => 'Oma sisältö',
      'custom_content_comment' => 'Tämä sisältö lisätään kenttään.',
    ],

    'form_field_types' => [
      'text' => 'Teksti',
      'email' => 'Sähköposti',
      'textarea' => 'Tekstialue',
      'checkbox' => 'Valintaruutu',
      'dropdown' => 'Pudotusvalikko',
      'file' => 'Tiedosto',
      'custom_code' => 'Oma koodi',
      'custom_content' => 'Oma sisältö',
    ],

    'form_field_validation' => [
      'select' => '--- Valitse ---',
      'required' => 'Pakollinen',
      'email' => 'Sähköposti',
      'numeric' => 'Numeerinen',
      'custom' => 'Oma sääntö',
    ],

    'email' => [
      'address_from' => 'Lähetysosoite',
      'address_from_placeholder' => 'john.doe@domain.com',

      'address_from_name' => 'Lähettäjän nimi',
      'address_from_name_placeholder' => 'John Doe',

      'address_replyto' => 'Vastausosoite',
      'address_replyto_comment' => 'Vastausviesti lähetetään tähän osoitteeseen.',

      'subject' => 'Viestin aihe',
      'subject_comment' => 'Aseta vain, mikäli haluat vaihtaa oletuksen (Asetukset > Sähköpostipohjat.',

      'template' => 'Sähköpostipohja',
      'template_comment' => 'Koodi, joka on luotu Asetukset > Sähköpostipohjat. Jätä tyhjäksi käyttääksesi oletuspohjaa: janvince.smallcontactform::mail.autoreply.',

      'allow_email_queue' => 'Laita lähetykset jonoon',
      'allow_email_queue_comment' => 'Lähetä sähköposti jonossa sen sijaan, että se lähetetään heti. OctoberCMS jono pitää konfiguroida ensin!',

      'allow_notifications' => 'Salli notifikaatiot',
      'allow_notifications_comment' => 'Lähetä notifikaatio onnistuneen lähetyksen jälkeen',

      'notification_address_to' => 'Notifikaatioiden sähköpostiosoite',
      'notification_address_to_comment' => 'Yksi osoite tai pilkulla erotettuna useampi',
      'notification_address_to_placeholder' => 'notifications@domain.com',

      'notification_address_from_form' => 'Pakota notifikaatio Lähettäjä-osoite (EI TUETA kaikissa sähköpostijärjestelmissä!)',
      'notification_address_from_form_comment' => 'Aseta notifikaatioiden Lähettäjä-osoite, josta Yhteydenottolomake näkyy tulevan (kenttä on asetettava palsta kartoitukseen).',

      'allow_autoreply' => 'Salli autoreply',
      'allow_autoreply_comment' => 'Lähetä lomakkeen sisältö kopiona lähettäjälle',

      'autoreply_name_field' => 'NIMI lomakekenttä',
      'autoreply_name_field_empty_option' => '-- Valitse --',
      'autoreply_name_field_comment' => 'Tyypin on oltava Teksti.<br><em>Tallenna ja lataa uudelleen tämä sivu, mikäli kentät ei näy.</em>',

      'autoreply_email_field' => 'EMAIL-osoite lomakekenttä',
      'autoreply_email_field_empty_option' => '-- Valitse --',
      'autoreply_email_field_comment' => 'Tyypin on oltava Email.<br><em>Tallenna ja lataa uudelleen tämä sivu, mikäli kentät ei näy.</em>',

      'autoreply_message_field' => 'VIESTI lomakekenttä',
      'autoreply_message_field_empty_option' => '-- Valitse --',
      'autoreply_message_field_comment' => 'Tyypin on oltava Tekstialue tai Teksti.<br><em>Tallenna ja lataa uudelleen tämä sivu, mikäli kentät ei näy.</em>',

      'notification_template' => 'Notifikaatioiden lomakepohja',
      'notification_template_comment' => 'Sähköpostipohjan koodi on luotu Asetukset > Sähköpostipohjat. Jätä tyhjäksi, jos haluat käyttää oletusta: janvince.smallcontactform::mail.autoreply.',

    ],

    'antispam' => [
      'add_antispam' => 'Lisää passiivinen roskapostisuodatin',
      'add_antispam_comment' => 'Lisää yksinkertainen mutta tehokas roskapostisuodatin (lisätietoja README.md tiedostossa)',

      'antispam_delay' => 'Roskapostisuodattimen viive (s)',
      'antispam_delay_comment' => 'Viive, kuinka nopeasti suodattimen kautta voi yrittää uudelleen lähettää (estää usein roskapostirobottien toimintaa)',
      'antispam_delay_placeholder' => '3',

      'antispam_label' => 'Roskapostisuodattimen kentän nimi',
      'antispam_label_comment' => 'Nimi näytetään selaimilla, joissa ei ole JavaScript päällä',
      'antispam_label_placeholder' => 'Ole hyvä ja tyhjennä tämä kenttä',

      'antispam_error_msg' => 'Virheviesti',
      'antispam_error_msg_comment' => 'Viesti, joka näytetään käyttäjälle kun roskapostisuodatin on käynnistynyt',
      'antispam_error_msg_placeholder' => 'Ole hyvä ja tyhjennä tämä kenttä!',

      'antispam_delay_error_msg' => 'Virheviesti viiveestä',
      'antispam_delay_error_msg_comment' => 'Virheviesti, joka näytetään mikäli lomake lähetetään liian nopeasti',
      'antispam_delay_error_msg_placeholder' => 'Uusi viesti lähetettiin liian nopeasti! Odota muutama sekunti ja yritä uudelleen!',

      'add_google_recaptcha' => 'Lisää Google reCaptcha',
      'add_google_recaptcha_comment' => 'Lisää reCaptcha yhteydenottolomakkeelle (Lisätietoja README.md tiedostossa).<br>Saat API-avaimet <a href="https://www.google.com/recaptcha/admin#list" target="_blank">Google reCaptcha -sivustolta</a>.',

      'google_recaptcha_version' => 'Google reCaptcha versio',
      'google_recaptcha_version_comment' => 'Valitse versio reCaptcha vimpaimesta.<br>Lisätietoja <a href="https://developers.google.com/recaptcha/docs/versions" target="_blank">Google reCaptcha -sivustolta</a>.',
      
      'google_recaptcha_versions' => [
        'v2checkbox' => 'reCaptcha V2 checkbox',
        'v2invisible' => 'reCaptcha V2 invisible',
      ],

      'google_recaptcha_site_key' => 'Sivustokohtainen avain',
      'google_recaptcha_site_key_comment' => 'Lisää sivustoavaimesi',

      'google_recaptcha_secret_key' => 'Salainen avain',
      'google_recaptcha_secret_key_comment' => 'Lisää salainen avaimesi',

      'google_recaptcha_wrapper_css' => 'reCaptcha laatikon wrapper CSS-luokka',
      'google_recaptcha_wrapper_css_comment' => 'CSS-luokka wrapper-laatikkoon reCaptcha:n ympärille',
      'google_recaptcha_wrapper_css_placeholder' => 'form-group',

      'google_recaptcha_error_msg' => 'Virheviesti',
      'google_recaptcha_error_msg_comment' => 'Viesti, joka näytetään väärästä reCAPTCHA-validoinnista.',
      'google_recaptcha_error_msg_placeholder' => 'Google reCAPTCHA validointivirhe!',

      'google_recaptcha_scripts_allow' => 'Lisää tarvittavat JS-skriptit automaattisesti',
      'google_recaptcha_scripts_allow_comment' => 'Tämän avulla lisätään tarvittavati JS-skriptit automaattisesti sivustollesi.',

      'google_recaptcha_locale_allow' => 'Salli kielialueen tunnistus',
      'google_recaptcha_locale_allow_comment' => 'Tämän avulla käännetään reCAPTCHA-skripti käyttäjän selainta vastaavalle kielelle.',

      'add_ip_protection' => 'Tarkista lähettäjän IP',
      'add_ip_protection_comment' => 'Älä salli liian montaa lähetystä yhdestä IP-osoitteesta',

      'add_ip_protection_count' => 'Sallittujen lähetysten maksimimäärä per päivä',
      'add_ip_protection_count_comment' => 'Kuinka monta lähetystä sallitaan yhdestä IP-osoitteesta per päivä',
      'add_ip_protection_count_placeholder' => '3',

      'add_ip_protection_error_get_ip' => 'Emme voineet varmentaa IP-osoitettasi!',

      'add_ip_protection_error_too_many_submits' => 'Liian monta lähetystä -viesti',
      'add_ip_protection_error_too_many_submits_comment' => 'Viesti, joka näytetään käyttäjälle',
      'add_ip_protection_error_too_many_submits_placeholder' => 'Olet lähettänyt liian monta viestiä 24-tunnin aikana!',

      'disabled_extensions' => 'Poista laajennukset käytöstä',
      'disabled_extensions_comment' => 'Asetukset tehdään Yksityisyys-välilehdellä',

    ],

    'mapping' => [

      'hint' => [
        'title' => 'Miksi kohdentaminen?',
        'content' => '
        <p>Voit rakentaa oman lomakkeen omilla kentillä ja kenttätyypeillä.</p>
        <p>Järjestelmä kirjoittaa kaiken tiedon tietokantaan, mutta pikaselausta varten Nimi-, Sähköposti- ja Viesti-sarakkeet ovat erikseen näkyvissä viestilistauksessa.</p>
        <p>Helpottaaksesi järjestelmää ymmärtämään kenttien riippuvuudet, sinun on kohdennettava ne manuaalisesti.</p>
        <p><em>Näitä kohdennuksia hyödynnetään myös autoreply-viesteissä, missä vähintään sähköpostikenttä on tärkeä.</em></p>
        ',
      ],

      'warning' => [
        'title' => 'Et voi valita lomakekenttiä?',
        'content' => '
        <p>Mikäli et näe lomakekenttiä, tallenna ja päivitä selaimesi (paina F5 tai Ctr+R / Cmd+R).</p>
        ',
      ],

    ],

    'privacy' => [
      'disable_messages_saving' => 'Poista viestin tallennus käytöstä',
      'disable_messages_saving_comment' => 'Mikäli valittuna, viestejä ei tallenneta muistiin.<br><strong>Tämä poistaa myös IP-suojauksen käytöstä!</strong>',
      'disable_messages_saving_comment_section' => '<div class="callout fade in callout-danger no-subheader"><div class="header"><i class="icon-warning"></i><h3>Varmista, että olet sallinut notifikaatioviestit tai muuten et saa ollenkaan tietoa lähetetyistä yhteydenotoista!</h3></div></div>',
    ],

    'tabs' => [
      'form' => 'Lomake',
      'buttons' => 'Lähetä-nappula',
      'form_fields' => 'Kentät',
      'mapping' => 'Kenttien kohdistaminen',
      'email' => 'Sähköposti',
      'antispam' => 'Roskapostisuodatus',
      'privacy' => 'Yksityisyys',
      'ga' => 'Google Analytics',
    ],

  ],

  'components' => [

      'groups' => [

          'hacks' => 'Hacks',
          'override_form' => 'Yliaja lomakeasetukset',
          'override_notifications' => 'Yliaja notifikaatioasetukset',
          'override_autoreply' => 'Yliaja autoreply-asetukset',
          'override' => 'Yliaja lomakkeen asetukset',
          'override_redirect' => 'Yliaja edelleenohjauksen asetukset',
          'override_ga' => 'Yliaja Google Analytics -asetukset',
          'override_notes' => 'Yliaja muistiinpanot',
      ],

      'properties' => [

        'form_description' => 'Lomakkeen kuvaus',
        'form_description_comment' => 'Voit lisätä vaihtoehtoisen lomakkeen kuvauksen, joka tallennetaan yhdessä muun datan kanssa viestilistaan. Voit myös käyttää {{ :slug }} tässä kohdassa.',

        'disable_fields' => 'Kentät pois käytöstä',
        'disable_fields_comment' => 'Tämä ottaa kentät pois käytöstä. Lisää halutut kentät erotettuna pystyviivalla (esim. name|message|phone)',

        'send_btn_label' => 'Lähetä-nappulan teksti',
        'send_btn_label_comment' => 'Yliaja Lähetä-nappulan teksti',

        'form_success_msg' => 'Lähetys onnistui -viesti',
        'form_success_msg_comment' => 'Yliaja Viesti lähetetty onnistuneesti -viesti',

        'form_error_msg' => 'Virheviesti',
        'form_error_msg_comment' => 'Yliaja virheviesti epäonnistuneesta lähetyksestä',

        'disable_notifications' => 'Poista notifikaatiot',
        'disable_notifications_comment' => 'Tämä poistaa notifikaatiosähköpostit käytöstä (yliajaa lomakeasetukset)',

        'notification_address_to' => 'Viesti TO',
        'notification_address_to_comment' => 'Tämän avulla voit yliajaa vastaanottajan sähköpostiosoitteen (mikäli aktiivinen lomakkeen asetuksissa)',

        'notification_address_from' => 'Lähettäjä FROM',
        'notification_address_from_comment' => 'Tämä yliajaa sähköpostiosoitteen notifikaatioista, mistä osoitteesta viesti tulee',

        'notification_address_from_name' => 'Lähettäjän FROM-nimi',
        'notification_address_from_name_comment' => 'Tämä yliajaa sähköpostiosoitteen nimen, kuka lähettäjänä on',

        'notification_template' => 'Notifikaatio pohja',
        'notification_template_comment' => 'Tämä yliajaa oletuspohjan jota notifikaatiot käyttävät (esim. janvince.smallcontactform::mail.notification)',

        'notification_subject' => 'Notifikaation aihe',
        'notification_template_comment' => 'Yliaja sähköpostin aihe',

        'disable_autoreply' => 'Poista notifikaatiot käytöstä',
        'disable_autoreply_comment' => 'Tämä poistaa notifikaatiopostit käytöstä (yliajaa lomakkeen asetukset)',

        'autoreply_address_from' => 'Viesti FROM',
        'autoreply_address_from_comment' => 'Tämä yliajaa sähköpostiosoitteen, jota käytetään autoreply osoitteena (mikäli käytössä lomakkeen asetuksissa)',

        'autoreply_address_from_name' => 'Lähettäjän (FROM) nimi',
        'autoreply_address_from_name_comment' => 'Tämä yliajaa lähettäjän nimen autoreply-sähköposteista (mikäli käytössä lomakkeen asetuksissa)',

        'autoreply_address_replyto' => 'Vastausosoite REPLY TO',
        'autoreply_address_replyto_comment' => 'Tämä yliajaa vastausosoitteen autoreply-sähköposteissa (mikäli käytössä lomakkeen asetuksissa)',

        'autoreply_template' => 'Autoreply-valmispohja',
        'autoreply_template_comment' => 'Tämä yliajaa autoreply-sähköpostipohjan (esim. janvince.smallcontactform::mail.autoreply)',

        'autoreply_subject' => 'Autoreply-sähköpostin aihe',
        'autoreply_template_comment' => 'Tämä yliajaa autoreply-vastauksen viestin aiheen',

      ]

  ],

];
