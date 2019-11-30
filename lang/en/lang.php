<?php

return [
  'plugin' => [
    'name' => 'Contact form',
    'description' => 'Simple contact form builder',
    'category' => 'Small plugins',
  ],

  'permissions' => [
    'access_messages' => 'Access messages list',
    'access_settings' => 'Manage backend preferences',
    'delete_messages' => 'Delete stored messages',
    'export_messages' => 'Export messages',
  ],

  'navigation' => [
    'main_label' => 'Contact form',
    'messages' => 'Messages',
  ],

  'controller' => [

    'contact_form' => [
      'name' => 'Contact form',
      'description' => 'Insert contact form to the page',
      'no_fields' => 'Please add some form fields in backend administration first (in Settings > Small Contact form > Fields)...',
    ],

    'filter' => [
      'date' => 'Date range',
    ],

    'scoreboard' => [
      'records_count' => 'Messages',
      'latest_record' => 'Latest from',
      'new_count' => 'New',
      'new_description' => 'Messages',
      'read_count' => 'Read',
      'all_count' => 'Total',
      'all_description' => 'Messages',
      'settings_btn' => 'Form settings',
      'mark_read' => 'Mark as read',
      'mark_read_confirm' => 'Really set selected messages as read?',
      'mark_read_success' => 'Successfully marked as read.',
    ],

    'preview' => [
      'record_not_found' => 'Message not found!',
    ],

  ],

  'models' => [

    'message' => [

      'columns' => [
        'id' => 'ID',
        'datetime' => 'Date and time',
        'form_data' => 'Form data',
        'name' => 'Name',
        'email' => 'Email',
        'message' => 'Message',
        'new_message' => 'Status',
        'new' => 'New',
        'read' => 'Read',
        'remote_ip' => 'Sender\'s IP',
        'form_alias' => 'Alias',
        'form_description' => 'Description',
        'created_at' => 'Created at',
        'updated_at' => 'Updated at',
      ]

    ],


  ],

  'controllers' => [

    'messages' => [

      'list_title' => 'Messages',
      'preview' => 'Preview',
      'preview_title' => 'Contact form message',
      'preview_date' => 'From date:',
      'preview_content_title' => 'Content:',
      'remote_ip' => 'Sent from ip',
      'export' => 'Export',
    ],

    'index' => [
      'unauthorized' => 'Unauthorized access',
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
        'label' => 'Contact form - Messages stats',
        'title' => 'Messages stats',
        'messages_all' => 'All',
        'messages_new' => 'New',
        'messages_read' => 'Read',
      ],

      'new_message' => [
        'label' => 'Contact form - New messages',
        'title' => 'New messages',
        'link_text' => 'Click to show Messages list',
      ],

    ],

  ],

  'settings' => [

    'form' => [

      'css_class' => 'Form CSS class',

      'use_placeholders' => 'Use placeholders',
      'use_placeholders_comment' => 'Placeholders will be shown instead of field labels',

      'disable_browser_validation' => 'Disable browser validation',
      'disable_browser_validation_comment' => 'Do not allow browser built-in validation and popups.',

      'success_msg' => 'Form success message',
      'success_msg_placeholder' => 'Your data was sent.',

      'error_msg' => 'Form error message',
      'error_msg_placeholder' => 'There was an error sending your data!',

      'allow_ajax' => 'Enable AJAX',
      'allow_ajax_comment' => 'Allow AJAX with fallback for non JavaScript browsers',

      'allow_confirm_msg' => 'Ask confirmation before form send',
      'allow_confirm_msg_comment' => 'Add confirm dialog before sending',

      'send_confirm_msg' => 'Confirmation text',
      'send_confirm_msg_placeholder' => 'Are you sure?',

      'hide_after_success' => 'Hide form after successful send',
      'hide_after_success_comment' => 'Show only success message without form',

      'add_assets' => 'Add assets',
      'add_assets_comment' => 'Automatically add necessary CSS and JS assets (more about assets in README.md file)',

      'add_css_assets' => 'Add CSS assets',
      'add_css_assets_comment' => 'All necesssary styles will be included',

      'add_js_assets' => 'Add JavaScript assets',
      'add_js_assets_comment' => 'All necesssary JavaScripts will be included',


    ],

    'buttons' => [
      'send_btn_text' => 'Send button text',
      'send_btn_text_placeholder' => 'Send',

      'send_btn_css_class' => 'Send button CSS class',
      'send_btn_css_class_placeholder' => 'btn btn-primary',

      'send_btn_wrapper_css' => 'Send button wrapper CSS class',
      'send_btn_wrapper_css_placeholder' => 'form-group',

    ],

    'redirect' => [

      'allow_redirect' => 'Redirect after submit',
      'allow_redirect_comment' => 'Redirect to another page after successfull submit',

      'redirect_url' => 'Page URL to redirect to',
      'redirect_url_comment' => 'Enter your page URL (eg. /contact/thank-you)',
      'redirect_url_placeholder' => '/contact/thank-you',

      'redirect_url_external' => 'External URL',
      'redirect_url_external_comment' => 'This is external URL path   (eg. http://www.domain.com)',

    ],

    'form_fields' => [
      'prompt' => 'Add new form field',

      'name' => 'FIELD NAME',
      'name_comment' => 'Lower case without special characters (eg. name, email, home_address, ...)',

      'type' => 'Field type',

      'label' => 'Label',
      'label_placeholder' => 'Full name',

      'field_styling' => 'Custom CSS class',
      'field_styling_comment' => 'Change default Bootstrap styles',

      'autofocus' => 'Autofocus field',
      'autofocus_comment' => 'Autofocus this form field',

      'wrapper_css' => 'Wrapper CSS class',
      'wrapper_css_placeholder' => 'form-group',

      'field_css' => 'Field CSS class',
      'field_css_placeholder' => 'form-control',

      'label_css' => 'Label CSS class',
      'label_css_placeholder' => '',

      'field_validation' => 'Field validation',
      'field_validation_comment' => 'Add field validation rules',

      'validation' => 'Validation',
      'validation_prompt' => 'Add validation',

      'validation_type' => 'Validation rule',

      'validation_error' => 'Validation error message',
      'validation_error_placeholder' => 'Please enter valid data.',
      'validation_error_comment' => 'Error message to use when validation fails',

      'validation_custom_type' => 'Validation rule name',
      'validation_custom_type_comment' => 'Enter Validator rule name (eg. regex, boolean, ...).<br>See <a href="https://octobercms.com/docs/services/validation#available-validation-rules" target="_blank">validation rules</a>.',
      'validation_custom_type_placeholder' => 'regex',

      'validation_custom_pattern' => 'Validation rule pattern',
      'validation_custom_pattern_comment' => 'Left empty or enter custom rule pattern (this is a right part of Validator rule after colon - eg. [abc] for regex).',
      'validation_custom_pattern_placeholder' => "/^[0-9]+$/",

      'custom' => 'Custom field',
      'custom_description' => 'Custom field with validation option',

      'add_values_prompt' => 'Add values',
      'field_value_id' => 'Field value ID',
      'field_value_content' => 'Field value content',

    ],

    'form_field_types' => [
      'text' => 'Text',
      'email' => 'Email',
      'textarea' => 'Textarea',
      'checkbox' => 'Checkbox',
      'dropdown' => 'Dropdown',
    ],

    'form_field_validation' => [
      'select' => '--- Select validation ---',
      'required' => 'Required',
      'email' => 'Email',
      'numeric' => 'Numeric',
      'custom' => 'Custom rule',
    ],

    'email' => [
      'address_from' => 'From address',
      'address_from_placeholder' => 'john.doe@domain.com',

      'address_from_name' => 'From address name',
      'address_from_name_placeholder' => 'John Doe',

      'subject' => 'Email subject',
      'subject_comment' => 'Set only if you want other than defined in Settings > Mail templates.',

      'template' => 'Email template',
      'template_comment' => 'Code of email template created in Settings > Email templates. Left empty for default template: janvince.smallcontactform::mail.autoreply.',

      'allow_email_queue' => 'Queueing mail',
      'allow_email_queue_comment' => 'Add email to queue instead of immediately send. You have to configure your OctoberCMS queue first!',

      'allow_notifications' => 'Allow notifications',
      'allow_notifications_comment' => 'Send notification after form has been sent',

      'notification_address_to' => 'Send notification to email',
      'notification_address_to_comment' => 'One email address or comma-separated list of addresses',
      'notification_address_to_placeholder' => 'notifications@domain.com',

      'notification_address_from_form' => 'Force notification From address (NOT SUPPORTED by all email systems!)',
      'notification_address_from_form_comment' => 'Set notification From address to an email entered in contact form (the field must be set in column mapping).',

      'allow_autoreply' => 'Allow autoreply',
      'allow_autoreply_comment' => 'Send a form content copy to author',

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
