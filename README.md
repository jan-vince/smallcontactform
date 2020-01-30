# Small Contact form
> Simple but flexible contact form builder with custom fields, validation and passive antispam.


## Installation

**GitHub** clone into `/plugins` dir:

```sh
git clone https://github.com/jan-vince/smallcontactform
```

**OctoberCMS backend**

Just look for 'Small Contact Form' in search field in:
> Settings > Updates & Plugins > Install plugins

### Permissions

> Settings > Administrators

You can set permissions to restrict access to *Settings > Small plugins > Contact form* and to messages list.


### Installation with composer

* Edit composer.json by adding new repository
```json
"repositories": [
    {
      "type": "vcs",
      "url": "https://github.com/jan-vince/smallcontactform"
    }
]
```
* run in command line
```sh
composer require janvince/smallcontactform
```


## Setup new Contact form

> Settings > Small Contact form

### FORM

* You can set your own CSS class name and general success/error messages.
* If you need it, placeholders can be used instead of labels
* Form can be hidden after successful submit.


#### Enable AJAX

By default, sending form will trigger page reload. With AJAX, everything can be done without page reloading which will be more user friendly.    
*If user's browser doesn't support (or has disabled) JavaScript, form will still work with page reloads after send.*

* For AJAX enabled form, before send confirmation dialog can be required.


#### Add Assets

If you want to start quickly, you can enable Add assets checkbox - and then Add CSS and JS assets.    
This will include necessary styles (Bootstrap, AJAX, October AJAX) and scripts (jQuery, Bootstrap, October AJAX framework and extras).

But you have to include Twig tags ````{% styles %}```` and ````{% scripts %}```` into your layout or page like this:

````
<html>
    <head>
        {% styles %}
    </head>
<body>

    {% page %}

    {% scripts %}

</body>

</html>
````

If you want to insert assets by hand, you can do it this way (or similar):

````
<html>
    <head>
        <link href="{{['~/modules/system/assets/css/framework.extras.css']|theme }}.css" rel="stylesheet">
    </head>
<body>

    {% page %}

    <script type="text/javascript" src="{{ [
        '@jquery',
        '@framework',
        '@framework.extras']|theme}}.js">
    </script>

</body>

</html>
````

### SEND BUTTON

* You can set button class and text.
* Form can automatically redirect to given URL after successful submit.


### FIELDS

Here you can add fields to build your contact (or other) form.

The idea is simple (and solution is so I hope):

* Click to add new field
  * Set it's name (this is used for ````<input name="{{name}}" id="{{name}}">````), so it should be lowercase without special characters.
  * Set Label if you need one (it is used for descriptive text above input field)
  * Set autofocus if you want cursor to automatically jump to this field (if checked more than one field, cursor jumps to first one)

When dropdown is selected there will be values/options repeater shown. You can add as many values you need.

> Hint: you can add dropdown empty option by adding a value with empty ID.


#### Field data validation

You can select from predefined rules or add custom Validator rules (read [documentation](https://octobercms.com/docs/services/validation#available-validation-rules)).

Some rules require additional validation pattern some of them not.

 * You can add one or more validation rules and error messages for them
 * Error messages will be shown above input field
 * You can reorder fields by drag and drop left circle (all fields can be collapsed by pressing Ctrl+click (Cmd+click on MacOS) on arrow in right top corners)

> Hint: For dropdown validation you can use `custom` validation type with rule `in` and list of IDs in `pattern` field (eg: 1,2,3).

> Note: There is a `custom_not_regex` validation rule as an inverse to built in `regex`.

### COLUMNS MAPPING

System writes all form data in database, but for quick overview Name, Email and Message columns are visible separately in Messages list.

But you have to help system to identify these columns by mapping to your form fields.

These mappings are also used for autoreply emails where at least Email field mapping is important.


### ANTISPAM

#### Passive antispam

Very simple implementation of passive antispam (inspired by [Nette AntiSpam Control](https://gist.github.com/Michal-Mikolas/2388131)).

The idea behind this is to check how fast is form send and if robots-catching field is filled.

* When allowed, you can set form delay (in seconds) to prevent too fast form sending (mostly by robots). You can add custom error message (will be shown in general error message box above form).
* You can add antispam field label and error message for non JavaScript enabled browsers.
 * If JavaScript is working, antispam field is automatically hidden and cleared.

#### Google reCaptcha

Implementation of Google reCaptcha antispam protection.

##### Setup

First you have to create new API keys pair in reCaptcha admin panel.

Hit **Get reCAPTCHA** button on [reCaptcha wellcome page](https://www.google.com/recaptcha). Set label and check reCAPTCHA v2 option and hit button Register.

Copy Site key and Secret key to Contact Form's settings fields.

If you want Contact Form to automatically include server scripts in your layout, check the button in Form settings.

#### Check sender's IP

You can add an extra form protection with limit submits from one IP address.

This check has own error message and custom field to set maximum submits.


### EMAIL

Mails can be sent directly or queued ([OctoberCMS queue](https://octobercms.com/docs/services/queues) must be configured!).

Don't forget to configure mail preferences in *Settings > Mail > Mail configuration*!

#### Data in email templates

There are variables available in all email templates:

* **fields** is array of [ 'field name' => 'post value' ]
* **fieldsDetails** is array of [ 'field name' => ['name', 'value', 'type', ...] ]

#### Allow autoreply

Email can be send to form sender as confirmation.

* You have to enter email address and name - it will be used as FROM field
* Email subject can be manually added here (or edited in *Settings > Mail > Mail templates (code: janvince.smallcontactform::mail.autoreply)*)
* Email TO address and name have to be assigned to form fields (in selections only corresponding field types are shown - if you don't see one, try to check it's type in Fields tab)
 * Message field can be also assigned (and will be saved separately into database)

#### Allow notifications

Once a Contact form is sent a notification can be immediately send to a provided email address (or comma-separated list of addresses).

*A **Reply to** address of notification email will be set to an email address from Contact form (if this field is used).*

You can also force **From** address to be set to the one entered in Contact form - but not all email systems support this!


## TRANSLATION

You can allow translation with [RainLab Translate](https://octobercms.com/plugin/rainlab-translate) plugin.

> After installation of Translate plugin, please add at least two languages in *Settings > Translate > Manage languages*.
> For translations to work there must be a localePicker component included in your layout/page.

#### Form texts

Most of Small Contact form texts can be edited right in *Settings > Small plugins > Contact form*.

#### Custom form fields

Translate plugin doesn't supports translation of individual repeater fields yet, so form field texts (label, validation error messages) have to be - for now - translated in a dictionary: *Settings > Translate > Translate messages*

> Please note that form fields labels will be shown in dictionary after first form render (on your frontend page) and validation error messages after first send.

#### Email templates

You can create your own email templates in *Settings > Mail > Mail templates* (for hint look inside of default templates starting with *janvince.smallcontactform::*).

Remember your email templates CODE and put in in Small Contact form email settings in *Settings > Small plugins > Contact form > Email tab*. For each language there can be specific template.

There is ````{{fields}}```` array available inside of email templates.

*If your custom form field has name eg. 'email', you use it in template with ````{{fields.email}}````.*

## MESSAGES LIST

All sent data from Contact form are saved and listed in backend Messages list.

If email, name and message fields are assigned on *Settings > Small plugins > contact form > Columns mapping tab*, they will be saved and shown in separate columns.

You can click on a record to see all form data. The message will be marked as read.


## DASHBOARD REPORT WIDGETS

There are available report widgets to be used on OctoberCMS dashboard.

#### Messages stats

Shows basic messages statistics.


#### New messages

Shows number of new messages. The color changes to green if there are any.

You can simply click widget to open Messages list.

## Overriding form settings 

You can override some of the form settings in component dropdown (on page or layout) or by passing them in component call.


####  Form settings

*There is also an Alias column that contain component's alias of the used form and is saved in messages log (this field is invisible by default in messages table).*

````
[contactForm myForm]
form_description = 'Form used in home page'
disable_fields = 'name|message'
send_btn_label = 'Go'
form_success_msg = 'Ok, sent :)'
form_error_msg = 'Houston, we have a problem'
````


You can override form's property in Twig component tag, eg:

````
{% component 'myForm' form_description = 'My other description' send_btn_label = 'Stay in touch' %}
````

This can be even more complex:
````
{% set myVar = 12345 %}
{% component 'myForm' form_description = ('Current value: ' ~ myVar) %}
````

In email template you can access some of these variables like this:
````
Form alias: {{fields.form_alias}}
Form description: {{fields.form_description}}
````


> When you override form description in ````{% component form_description = 'My description' %}````, description will be added as a **hidden field** into a form. Do not use this to store private data as this is easily visible in page HTML code!

#### Override notification email options
You can set different email address to which notification about sent form will be delivered and also change a notification template.

*Template must exist in Settings > Mail > Mail configuration*.

If you add a locale string to ````notification_template```` property (like ````notification_template_en````) than that one has priority and will be used if  ````App::getLocale()```` returns ````en````.

````
[contactForm salesForm]
disable_notifications = true
notification_address_to = 'sales@domain.com'
notification_address_from = 'contactform@domain.com'
notification_template = 'notification-sales'
notification_template_en = 'notification-sales-en'
notification_template_cs = 'notification-sales-cs
````

> Local strings in `notification_template` canot be used in Twig!

#### Override autoreply email options
You can set different email address and name for autoreply message and also use different autoreply template.

*Template must exist in Settings > Mail > Mail configuration*.

If you add a locale string to ````autoreply_template```` or ````autoreply_address_from_name```` property (like ````autoreply_template_en```` or ````autoreply_address_from_name_en````) than that one has priority and will be used if  ````App::getLocale()```` returns ````en````.

````
[contactForm orderForm]
autoreply_address_from = 'order@domain.com'
autoreply_address_from_name = 'Orders'
autoreply_address_from_name_en = 'Orders'
autoreply_address_from_name_cs = 'Objednávky'
autoreply_template = 'autoreply-order'
autoreply_template_en = 'autoreply-order-en'
autoreply_template_cs = 'autoreply-order-cs'
````
#### Disable some form fields
You can disable some of defined form fields by passing their names in ````disable_fields```` component property.

Several fields can be added while separated with pipe ````|````.

````
[contactForm]
disable_fields = 'phone|name|confirmation'
````

Or you can disable some of functions:

````
[contactForm]
disable_notifications = true
disable_autoreply = true
````

----

## HOWTO

#### Add an empty option to dropdown field

You can easily add an empty option with empty ID and some value.

![Dropdown empty field](https://www.vince.cz/storage/app/media/OctoberCMS/scf-settings-dropdown.png)

#### Validate dropdown field

If you want to validate dropdown options, you can use custom validation rule `in` with list of IDs as a validation pattern.

![Dropdown validation](https://www.vince.cz/storage/app/media/OctoberCMS/scf-settings-dropdown-validation.png)


----
> My thanks goes to:    
> [OctoberCMS](http://www.octobercms.com) team members and supporters for this great system.   
> [Andrew Measham](https://unsplash.com/@andrewmeasham) for his photo.   
> [Font Awesome](http://fontawesome.io/icons/) for nice icons.


Created by [Jan Vince](http://www.vince.cz), freelance web designer from Czech Republic.
