<?php

return [
	'plugin' => [
		'name' => 'Small Contact form',
		'description' => 'Simple contact form builder and sent messages database',
		'category' => 'Small plugins',
	],

	'permissions' => [
		'access_messages' => 'Show form messages',
	],

	'navigation' => [
		'main_label' => 'Contact form',
		'messages' => 'Sent messages',
	],

	'controller' => [

		'contact_form' => [
			'name' => 'Contact form',
			'description' => 'Small contact form',
			'no_fields' => 'Please add some form fields in backend administration first (in Settings > Small Contact form > Fields)...',
		],

		'filter' => [
			'date' => 'Date range',
		],

		'scoreboard' => [
			'records_count' => 'Messages',
			'latest_record' => 'Latest from',
			'new_count' => 'New',
			'read_count' => 'Read',
			'all_count' => 'Total',
			'all_description' => 'Messages',
		],

		'preview' => [
			'record_not_found' => 'Message not found!',
		],

	],

	'models' => [

		'message' => [

			'columns' => [
				'datetime' => 'Date and time',
				'form_data' => 'Form data',
				'name' => 'Name',
				'email' => 'Email',
				'message' => 'Message',
				'new_message' => 'Status',
				'new' => 'New',
				'read' => 'Read',

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

		],

		'index' => [
			'unauthorized' => 'Unauthorized access',
		],

	],

	'settings' => [

		'form' => [

			'css_class' => 'Form CSS class',

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


		],

		'form_fields' => [
			'prompt' => 'Add new form field',

			'name' => 'FIELD NAME',
			'name_comment' => 'Lower case without special characters (eg. name, email, home_address, ...)',

			'type' => 'Field type',

			'label' => 'Label',
			'label_placeholder' => 'Full name',

			'field_styling' => 'Custom CSS styles',
			'field_styling_comment' => 'Change default Bootstrap styles',

			'autofocus' => 'Autofocus field',
			'autofocus_comment' => 'Autofocus this form field',

			'wrapper_css' => 'Wrapper CSS class',
			'wrapper_css_placeholder' => 'form-group',

			'field_css' => 'Field CSS class',
			'field_css_placeholder' => 'form-control',

			'field_validation' => 'Field validation',
			'field_validation_comment' => 'Add field validation rules',

			'validation' => 'Validation',
			'validation_prompt' => 'Add validation',

			'validation_type' => 'Validation rule',

			'validation_error' => 'Validation error message',
			'validation_error_placeholder' => 'Please enter valid data.',
			'validation_error_comment' => 'Error message to use when validation fails',

			'custom' => 'Custom field',
			'custom_description' => 'Custom field with validation option',


		],

		'form_field_types' => [
			'text' => 'Text',
			'email' => 'Email',
			'textarea' => 'Textarea',
		],

		'form_field_validation' => [
			'select' => '--- Select validation ---',
			'required' => 'Required',
			'email' => 'Email',
			'numeric' => 'Numeric',
		],

		'email' => [
			'address_from' => 'From address',
			'address_from_placeholder' => 'john.doe@domain.com',

			'address_from_name' => 'From address name',
			'address_from_name_placeholder' => 'John Doe',

			'subject' => 'Email subject',
			'comment' => 'Set only if you want other than defined in Settings > Mail templates.',

			'allow_email_queue' => 'Queueing mail',
			'allow_email_queue_comment' => 'Add email to queue instead of immediately send. You have to configure your OctoberCMS queue first!',

			'allow_notifications' => 'Allow notifications',
			'allow_notifications_comment' => 'Send notification after form has been sent',

			'notification_address_to' => 'Send notification to email',
			'notification_address_to_placeholder' => 'notifications@domain.com',

			'allow_autoreply' => 'Allow auto reply',
			'allow_autoreply_comment' => 'Send a form content copy to author',

			'autoreply_name_field' => 'Email TO "name" form field',
			'autoreply_name_field_empty_option' => '-- Select --',
			'autoreply_name_field_comment' => 'Select a field with sender name (must be type of Text). Save and refresh this page if you can\'t see your fields.',

			'autoreply_email_field' => 'Email TO "address" form field',
			'autoreply_email_field_empty_option' => '-- Select --',
			'autoreply_email_field_comment' => 'Select a field with sender email address (must be type of Email). Save and refresh this page if you can\'t see your fields.',

			'autoreply_message_field' => 'Message form field',
			'autoreply_message_field_empty_option' => '-- Select --',
			'autoreply_message_field_comment' => 'Select a message field (must be type of Textarea). Save and refresh this page if you can\'t see your fields.',

		],

		'antispam' => [
			'add_antispam' => 'Add antispam protection',
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



		],

		'tabs' => [
			'form' => 'Form',
			'buttons' => 'Send button',
			'form_fields' => 'Fields',
			'email' => 'Email',
			'antispam' => 'Antispam',
		],

	],

	'permissions' => [
		'access_messages' => 'Access messages list',
		'access_settings' => 'Manage backend preferences',
	],
];
