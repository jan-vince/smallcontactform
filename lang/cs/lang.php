<?php

return [
	'plugin' => [
		'name' => 'Kontaktní formulář',
		'description' => 'Jednoduchý kontaktní formulář s možností editace vlastních polí a pasivní antispamovou ochrannou',
		'category' => 'Small plugins',
	],

	'permissions' => [
		'access_messages' => 'Zobrazit zprávy',
		'access_settings' => 'Zobrazit nastavení',
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
			'read_count' => 'Přečtené',
			'all_count' => 'Celkem',
			'all_description' => 'Zpráv',
		],

		'preview' => [
			'record_not_found' => 'Zpráva nebyla nalezena!',
		],

	],

	'models' => [

		'message' => [

			'columns' => [
				'datetime' => 'Datum a čas',
				'form_data' => 'Data formuláře',
				'name' => 'Jméno',
				'email' => 'Email',
				'message' => 'Zpráva',
				'new_message' => 'Stav',
				'new' => 'Nová',
				'read' => 'Přečtená',

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

		],

		'index' => [
			'unauthorized' => 'Neoprávněný přístup!',
		],

	],

	'settings' => [

		'form' => [

			'css_class' => 'CSS třída formuláře',

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

			'send_btn_css_class' => 'CSS styly odesílacího tlačítka',
			'send_btn_css_class_placeholder' => 'btn btn-primary',


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

			'wrapper_css' => 'CSS třídy kontejneru',
			'wrapper_css_placeholder' => 'form-group',

			'field_css' => 'CSS třidy pole',
			'field_css_placeholder' => 'form-control',

			'field_validation' => 'Validační pravidla pole',
			'field_validation_comment' => 'Povolí nastavení vlastních validačních pravidel',

			'validation' => 'pravidlo',
			'validation_prompt' => 'Přidat pravidlo',

			'validation_type' => 'Typ',

			'validation_error' => 'Chybová zpráva',
			'validation_error_placeholder' => 'Prosím vložte správná data.',
			'validation_error_comment' => 'Chybová hláška, která se zobrazí u pole',

			'custom' => 'Vlastní pole',
			'custom_description' => 'Vlastní pole s validačními pravidly',


		],

		'form_field_types' => [
			'text' => 'Text',
			'email' => 'Email',
			'textarea' => 'Textarea',
		],

		'form_field_validation' => [
			'select' => '--- Vyberte pravidlo ---',
			'required' => 'Vyžadováno',
			'email' => 'Email',
			'numeric' => 'Číslo',
		],

		'email' => [
			'address_from' => 'Adresa OD',
			'address_from_placeholder' => 'john.doe@domain.com',

			'address_from_name' => 'Jméno odesílatele',
			'address_from_name_placeholder' => 'John Doe',

			'subject' => 'Předmět emailu',
			'comment' => 'Nastavte pouze pokud chcete přepsat předmět definovaný v šabloně (Nastavení > E-mailové šablony).',

			'allow_email_queue' => 'Řadit do fronty',
			'allow_email_queue_comment' => 'Přidat emaily do fronty místo okamžitého odeslání. Musíte ale nejdříve správně nakonfigurovat frontu systému OctoberCMS!',

			'allow_notifications' => 'Povolit odesílání upozornění',
			'allow_notifications_comment' => 'Odesílat upozornění, pokud někdo odešle formulář',

			'notification_address_to' => 'Upozornění posílat na adresu:',
			'notification_address_to_placeholder' => 'notifications@domain.com',

			'allow_autoreply' => 'Povolit automatickou odpověď',
			'allow_autoreply_comment' => 'Poslat automatickou odpověď odesílateli formuláře',

			'autoreply_name_field' => 'Pole formuláře, které obsahuje jméno odesílatele',
			'autoreply_name_field_empty_option' => '-- Vyberte --',
			'autoreply_name_field_comment' => 'Vyberte pole, které bude použito pro automatickou odpověď jako jméno odesílatele (musí to být pole typu Text). Uložte nastavení a znovu načtěte stránku, pokud ve výběru pole nevidíte.',

			'autoreply_email_field' => 'Pole formuláře, které obsahuje adresu odesílatele',
			'autoreply_email_field_empty_option' => '-- Vyberte --',
			'autoreply_email_field_comment' => 'Vyberte pole, které bude použito pro automatickou odpověď jako adresa odesílatele (musí to být pole typu Text). Uložte nastavení a znovu načtěte stránku, pokud ve výběru pole nevidíte.',

			'autoreply_message_field' => 'POle formuláře, které obsahuje zprávu',
			'autoreply_message_field_empty_option' => '-- vyberte --',
			'autoreply_message_field_comment' => 'Vyberte pole, které bude použito pro automatickou odpověď jako jméno odesílatele (musí to být pole typu Textarea). Uložte nastavení a znovu načtěte stránku, pokud ve výběru pole nevidíte.',

		],

		'antispam' => [
			'add_antispam' => 'Přidat ochranu proti spamu',
			'add_antispam_comment' => 'Přidá jednoduchou ale efektivní pasivní ochranu proti robotům (více informací v souboru README.md)',

			'antispam_delay' => 'Zpoždění formuláře (s)',
			'antispam_delay_comment' => 'Test na příliš ryfchlé odeslání formuláře (většinou roboty)',
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



		],

		'tabs' => [
			'form' => 'Formulář',
			'buttons' => 'Odesílací tlačítko',
			'form_fields' => 'Pole formuláře',
			'email' => 'Email',
			'antispam' => 'Antispam',
		],

	],

	'permissions' => [
		'access_messages' => 'Přístup k seznamu zpráv',
		'access_settings' => 'Přístup k nastavení',
	],
];
