<?php

return [
  'plugin' => [
    'name' => 'Formulaire de contact',
    'description' => 'Générateur simple de formulaire de contact',
    'category' => 'Petits plugins',
  ],

  'permissions' => [
    'access_messages' => 'Accéder à la liste des messages',
    'access_settings' => 'Gérer les préférences d\'administration',
    'delete_messages' => 'Supprimer les messages stockés',
    'export_messages' => 'Exporter des messages',
  ],

  'navigation' => [
    'main_label' => 'Formulaire de contact',
    'messages' => 'Messages',
  ],

  'controller' => [

    'contact_form' => [
      'name' => 'Formulaire de contact',
      'description' => 'Insérer un formulaire de contact sur la page',
      'no_fields' => 'Veuillez ajouter d\’abord des champs de formulaire dans l\’administration dorsale (dans Paramètres > Formulaire de contact > Champs) ...',
    ],

    'filter' => [
      'date' => 'Plage de dates',
    ],

    'scoreboard' => [
      'records_count' => 'Messages',
      'latest_record' => 'Dernier message de',
      'new_count' => 'Nouveau',
      'new_description' => 'Messages',
      'read_count' => 'Lus',
      'all_count' => 'Total',
      'all_description' => 'Messages',
      'settings_btn' => 'Paramètres du formulaire',
      'mark_read' => 'Marquer comme lu',
      'mark_read_confirm' => 'Voulez-vous vraiment définir les messages sélectionnés comme lus?',
      'mark_read_success' => 'Les messages ont été marqués comme lu avec succès.',
    ],

    'preview' => [
      'record_not_found' => 'Message non trouvé!',
    ],

  ],

  'models' => [

    'message' => [

      'columns' => [
        'id' => 'ID',
        'datetime' => 'Date et heure',
        'form_data' => 'Données du formulaire',
        'name' => 'Nom',
        'email' => 'E-mail',
        'message' => 'Message',
        'new_message' => 'Statut',
        'new' => 'Nouveau',
        'read' => 'Lu',
        'remote_ip' => 'IP de l\'expéditeur',
        'form_alias' => 'Alias',
        'form_description' => 'Description',
        'created_at' => 'Créé à',
        'updated_at' => 'Modifié à',
      ]

    ],


  ],

  'controllers' => [

    'messages' => [

      'list_title' => 'Messages',
      'preview' => 'Aperçu',
      'preview_title' => 'Message du formulaire de contact',
      'preview_date' => 'Date : ',
      'preview_content_title' => 'Contenu :',
      'remote_ip' => 'Envoyé depuis l\'IP :',
      'export' => 'Exporter',
    ],

    'index' => [
      'unauthorized' => 'Accès non autorisé',
    ],

  ],

  'mail' => [

    'templates' => [

      'autoreply' => 'Réponse automatique du formulaire (français)',
      'autoreply_cs' => 'Réponse automatique du formulaire (tchèque)',

      'notification' => 'Message de notification du formulaire (français)',
      'notification_cs' => 'Message de notification du formulaire (tchèque)',

    ]

  ],

  'reportwidget' => [

    'partials' => [

      'messages' => [
        'label' => 'Formulaire de contact - Statistiques des messages',
        'title' => 'Statistiques des messages',
        'messages_all' => 'Tout',
        'messages_new' => 'Nouveaux',
        'messages_read' => 'Lus',
      ],

      'new_message' => [
        'label' => 'Formulaire de contact - Nouveaux messages',
        'title' => 'Nouveaux messages',
        'link_text' => 'Cliquez pour afficher la liste des messages',
      ],

    ],

  ],

  'settings' => [

    'form' => [

      'css_class' => 'Classe CSS du formulaire',

      'use_placeholders' => 'Utiliser des "placeholder"',
      'use_placeholders_comment' => 'Des "placeholder" seront affichés à la plage des étiquettes de champs.',

      'disable_browser_validation' => 'Désactiver la validation du navigateur',
      'disable_browser_validation_comment' => 'Ne pas autoriser la validation intégrée du navigateur et ses fenêtres contextuelles.',

      'success_msg' => 'Message de réussite du formulaire',
      'success_msg_placeholder' => 'Vos données ont été envoyées.',

      'error_msg' => 'Message d\'erreur du formulaire',
      'error_msg_placeholder' => 'Une erreur s\'est produite lors de l\'envoi de vos données!',

      'allow_ajax' => 'Activer AJAX',
      'allow_ajax_comment' => 'Autoriser AJAX avec rechange pour les navigateurs sans JavaScript.',

      'allow_confirm_msg' => 'Demander une confirmation avant l\'envoi du formulaire',
      'allow_confirm_msg_comment' => 'Ajouter une boîte de dialogue de confirmation avant l\'envoi',

      'send_confirm_msg' => 'Texte de confirmation',
      'send_confirm_msg_placeholder' => 'Êtes-vous sûr?',

      'hide_after_success' => 'Masquer le formulaire après l\'envoi réussi',
      'hide_after_success_comment' => 'Afficher uniquement le message de réussite sans formulaire',

      'add_assets' => 'Ajouter des assets',
      'add_assets_comment' => 'Ajouter automatiquement les assets CSS et JS nécessaires (plus d\'informations sur les assets dans le fichier README.md - en anglais)',

      'add_css_assets' => 'Ajouter des assets CSS',
      'add_css_assets_comment' => 'Tous les styles nécessaires seront inclus',

      'add_js_assets' => 'Ajouter des assets JavaScript',
      'add_js_assets_comment' => 'Tous les scripts JavaScript nécessaires seront inclus',


    ],

    'buttons' => [
      'send_btn_text' => 'Texte du bouton envoyer',
      'send_btn_text_placeholder' => 'Envoyer',

      'send_btn_css_class' => 'Classe(s) CSS du bouton envoyer',
      'send_btn_css_class_placeholder' => 'btn btn-primary',

      'send_btn_wrapper_css' => 'Classe(s) CSS du wrapper du bouton envoyer',
      'send_btn_wrapper_css_placeholder' => 'form-group',

    ],

    'redirect' => [

      'allow_redirect' => 'Rediriger après soumission',
      'allow_redirect_comment' => 'Rediriger vers une autre page après un envoie réussie',

      'redirect_url' => 'URL de la page vers laquelle rediriger',
      'redirect_url_comment' => 'Entrez l\'URL de votre page (par exemple, /contact/thank-you)',
      'redirect_url_placeholder' => '/contact/thank-you',

      'redirect_url_external' => 'URL externe',
      'redirect_url_external_comment' => 'Ceci est un chemin d\'URL externe (ex. http://www.domain.com)',

    ],

    'form_fields' => [
      'prompt' => 'Ajouter un nouveau champ de formulaire',

      'name' => 'Nom du champ',
      'name_comment' => 'Minuscules sans caractères spéciaux (ex. nom, email, adresse_personnelle, ...)',

      'type' => 'Type de champ',

      'label' => 'Étiquette',
      'label_placeholder' => 'Nom complet',

      'field_styling' => 'Classe CSS personnalisée',
      'field_styling_comment' => 'Changer les styles de Bootstrap par défaut',

      'autofocus' => 'Champ autofocus',
      'autofocus_comment' => 'Autofocus ce champ du formulaire',

      'wrapper_css' => 'Classe CSS du wrapper',
      'wrapper_css_placeholder' => 'form-group',

      'field_css' => 'Classe CSS du champ',
      'field_css_placeholder' => 'form-control',

      'label_css' => 'Classe CSS de l\'étiquette',
      'label_css_placeholder' => '',

      'field_validation' => 'Validation du champ',
      'field_validation_comment' => 'Ajouter des règles de validation du champ',

      'validation' => 'Validation',
      'validation_prompt' => 'Ajouter une validation',

      'validation_type' => 'Règle de validation',

      'validation_error' => 'Message d\'erreur de validation',
      'validation_error_placeholder' => 'S\'il vous plaît entrer des données valides.',
      'validation_error_comment' => 'Message d\'erreur à utiliser lorsque la validation échoue',

      'custom' => 'Champ personnalisé',
      'custom_description' => 'Champ personnalisé avec option de validation',


    ],

    'form_field_types' => [
      'text' => 'Texte',
      'email' => 'Email',
      'textarea' => 'Aire de texte',
      'checkbox' => 'Case à cocher',
      'dropdown' => 'Dropdown',
      'file' => 'File',
      'custom_code' => 'Custom code',
      'custom_content' => 'Custom content',
    ],

    'form_field_validation' => [
      'select' => '--- Sélectionnez la validation ---',
      'required' => 'Requis',
      'email' => 'Email',
      'numeric' => 'Numérique',
    ],

    'email' => [
      'address_from' => 'Adresse de l\'expéditeur',
      'address_from_placeholder' => 'john.doe@domain.com',

      'address_from_name' => 'Nom de l\'expéditeur',
      'address_from_name_placeholder' => 'John Doe',

      'subject' => 'Sujet de l\'e-mail',
      'subject_comment' => 'Définissez uniquement si vous souhaitez une définition autre que celle définie dans Paramètres > Modèles des e-mails.',

      'template' => 'Modèle e-mail',
      'template_comment' => 'Code du modèle e-mail créé dans Paramètres > Modèles des e-mails. Laissez vide pour le modèle par défaut: janvince.smallcontactform::mail.autoreply.',

      'allow_email_queue' => 'E-mail en fille d\'attente',
      'allow_email_queue_comment' => 'Ajouter un email à la file d\'attente au lieu de l\'envoyer immédiatement. Vous devez d\'abord configurer votre file d\'attente OctoberCMS!',

      'allow_notifications' => 'Autoriser les notifications',
      'allow_notifications_comment' => 'Envoyer une notification après l\'envoi du formulaire',

      'notification_address_to' => 'Envoyer une notification à l\'e-mail',
      'notification_address_to_comment' => 'Une adresse électronique ou une liste d\'adresses séparées par des virgules',
      'notification_address_to_placeholder' => 'notifications@domain.com',

      'notification_address_from_form' => 'Forcer l\'adresse e-mail de la notification (NON PRIS EN CHARGE par tous les systèmes de messagerie!)',
      'notification_address_from_form_comment' => 'Définir l\'adresse e-mail entré dans le formulaire de contact comme adresse de l\'expéditeur (le champ doit être défini dans le mappage de colonnes).',

      'allow_autoreply' => 'Autoriser une copie à l\'auteur',
      'allow_autoreply_comment' => 'Envoyer une copie du contenu du formulaire à l\'auteur',

      'autoreply_name_field' => 'Champ du formulaire avec le NOM',
      'autoreply_name_field_empty_option' => '-- Sélectionnez --',
      'autoreply_name_field_comment' => 'Doit être du type Texte.<br><em>Enregistrez et actualisez cette page si vous ne pouvez pas voir vos champs.</em>',

      'autoreply_email_field' => 'Champ du formulaire avec l\'adresse E-MAIL',
      'autoreply_email_field_empty_option' => '-- Sélectionnez --',
      'autoreply_email_field_comment' => 'Doit être du type email.<br><em>Enregistrez et actualisez cette page si vous ne pouvez pas voir vos champs.</em>',

      'autoreply_message_field' => 'Champ du formulaire avec le contenu du MESSAGE',
      'autoreply_message_field_empty_option' => '-- Sélectionnez --',
      'autoreply_message_field_comment' => 'Doit être du type Aire de texte ou Texte.<br><em>Enregistrez et actualisez cette page si vous ne pouvez pas voir vos champs.</em>',

      'notification_template' => 'Modèle e-mail de la notification',
      'notification_template_comment' => 'Code du modèle de courrier électronique créé dans Paramètres > Modèless des e-mails. Laisser vide pour le modèle par défaut : janvince.smallcontactform::mail.autoreply.',

    ],

    'antispam' => [
      'add_antispam' => 'Ajouter une protection antispam passive',
      'add_antispam_comment' => 'Ajouter un contrôle antispam passif simple mais efficace (plus d’informations dans le fichier README.md - en anglais)',

      'antispam_delay' => 'Délai Antispam (en secondes)',
      'antispam_delay_comment' => 'Protection différée pour l\'envoi de formulaires trop rapide (généralement par des robots)',
      'antispam_delay_placeholder' => '3',

      'antispam_label' => 'Étiquette de champ antispam',
      'antispam_label_comment' => 'L\'étiquette sera visible pour les navigateurs non activés par JavaScript',
      'antispam_label_placeholder' => 'Veuillez effacer ce champ',

      'antispam_error_msg' => 'Message d\'erreur',
      'antispam_error_msg_comment' => 'Message à afficher à l\'utilisateur lorsque la protection antispam est déclenchée',
      'antispam_error_msg_placeholder' => 'Veuillez vider ce champ!',

      'antispam_delay_error_msg' => 'Message d\'erreur de délai',
      'antispam_delay_error_msg_comment' => 'Message à montrer à l\'utilisateur lorsque le formulaire a été envoyé trop rapidement',
      'antispam_delay_error_msg_placeholder' => 'Formulaire envoyé trop vite! S\'il vous plaît attendre quelques secondes et essayez à nouveau!',

      'add_google_recaptcha' => 'Ajouter Google reCaptcha',
      'add_google_recaptcha_comment' => 'Ajoutez reCaptcha au formulaire de contact (plus d\’informations dans le fichier README.md - en anglais). <br> Vous pouvez obtenir les clés d’API sur le <a href="https://www.google.com/recaptcha/admin#list" target="_blank">Google reCaptcha</a>.',

      'google_recaptcha_site_key' => 'Clé du site',
      'google_recaptcha_site_key_comment' => 'Mettez votre clé du site',

      'google_recaptcha_secret_key' => 'Clé secrète',
      'google_recaptcha_secret_key_comment' => 'Mettez votre clé secrète',

      'google_recaptcha_error_msg' => 'Message d\'erreur',
      'google_recaptcha_error_msg_comment' => 'Message à afficher à l\'utilisateur lorsque le reCAPTCHA n\'est pas validé.',
      'google_recaptcha_error_msg_placeholder' => 'Erreur de validation du reCAPTCHA de Google!',

      'google_recaptcha_scripts_allow' => 'Ajouter automatiquement les scripts JS nécessaires',
      'google_recaptcha_scripts_allow_comment' => 'Cela ajoutera un lien vers les scripts JS sur votre site.',

      'google_recaptcha_locale_allow' => 'Autoriser la détection des paramètres de langues',
      'google_recaptcha_locale_allow_comment' => 'Cela ajoutera les paramètres de langues actuels de la page Web au script reCAPTCHA, de sorte qu\'il sera traduit.',

      'add_ip_protection' => 'Vérifier l\'adresse IP de l\'expéditeur',
      'add_ip_protection_comment' => 'Ne pas autoriser trop de formulaires soumis à partir d\'une même adresse IP',

      'add_ip_protection_count' => 'Formulaire maximum soumis au cours d\'une journée',
      'add_ip_protection_count_comment' => 'Nombre de soumissions autorisées à partir d\'une même adresse IP au cours d\'une seule journée',
      'add_ip_protection_count_placeholder' => '3',

      'add_ip_protection_error_get_ip' => 'Nous n\'avons pas pu déterminer votre adresse IP!',

      'add_ip_protection_error_too_many_submits' => 'Message d\'erreur lorsque trop de messages sont envoyés',
      'add_ip_protection_error_too_many_submits_comment' => 'Message d\'erreur à montrer à l\'utilisateur',
      'add_ip_protection_error_too_many_submits_placeholder' => 'Trop de messages ont été envoyés par votre adresse aujourd\'hui!',

      'disabled_extensions' => 'Extensions désactivées',
      'disabled_extensions_comment' => 'Les paramètres définis dans l\'onglet Confidentialité ont désactivé ces extensions.',

    ],

    'mapping' => [

      'hint' => [
        'title' => 'Pourquoi le mappage des champs?',
        'content' => '
        <p>Vous pouvez créer un formulaire personnalisé avec vos propres noms et types de champs.</p>
        <p>Le système écrit toutes les données de formulaire dans la base de données, mais pour une présentation rapide, les colonnes Nom, E-mail et Message sont visibles séparément dans la listedes messages.</p>
        <p>Vous devez donc aider le système à identifier ces colonnes en les associant à vos champs de formulaire.</p>
        <p><em>Ces mappages sont également utilisés pour les e-mails à réponse automatique dans lesquels au moins le mappage du champ e-mail est important.</em></p>
        ',
      ],

      'warning' => [
        'title' => 'Vous ne pouvez pas sélectionner vos champs de formulaire?',
        'content' => '
        <p>Si vous ne voyez pas vos champs de formulaire, cliquez sur le bouton Enregistrer en bas de cette page, puis rechargez la page (F5 ou Ctrl+R / Cmd+R).</p>
        ',
      ],

    ],

    'privacy' => [
      'disable_messages_saving' => 'Désactiver l\'enregistrement des messages',
      'disable_messages_saving_comment' => 'Lorsque cette case est cochée, aucune donnée ne sera enregistrée dans la liste de messages.<br><strong>La protection IP sera également désactivée!</strong>',
      'disable_messages_saving_comment_section' => '<div class="callout fade in callout-danger no-subheader"><div class="header"><i class="icon-warning"></i><h3>Assurez-vous d\'autoriser les courriels de notification, sinon vous ne recevrez aucune donnée des formulaires envoyés!</h3></div></div>',
    ],

    'tabs' => [
      'form' => 'Formulaire',
      'buttons' => 'Bouton envoyer',
      'form_fields' => 'Champs',
      'mapping' => 'Mappage des colonnes',
      'email' => 'E-mail',
      'antispam' => 'Antispam',
      'privacy' => 'Confidentialité'
    ],

  ],

  'components' => [

      'groups' => [

          'hacks' => 'Hacks',

      ],
      'properties' => [

          'disable_notifications' => 'Désactiver les e-mails de notification',
          'disable_notifications_comment' => 'Ceci désactivera les courriels de notification (remplace les paramètres du formulaire)',

        'form_description' => 'Description du formulaire',
        'form_description_comment' => 'Vous pouvez ajouter une description de formulaire facultative, qui sera enregistrée avec les autres données envoyées dans la liste de messages. Vous pouvez également utiliser {{:slug}} ici.',

      ]

  ],

];
