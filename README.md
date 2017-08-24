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
* Add field validation rules:
 * You can add one or more validation rules and error messages for them
 * Error messages will be shown above input field
* You can reorder fields by drag and drop left circle (all fields can be collapsed by pressing Ctrl+click (Cmd+click on MacOS) on arrow in right top corners)

### COLUMNS MAPPING

System writes all form data in database, but for quick overview Name, Email and Message columns are visible separately in Messages list.

But you have to help system to identify these columns by mapping to your form fields.

These mappings are also used for autoreply emails where at least Email field mapping is important.


### ANTISPAM

Very simple implementation of passive antispam (inspired by [Nette AntiSpam Control](https://gist.github.com/Michal-Mikolas/2388131)).

The idea behind this is to check how fast is form send and if robots-catching field is filled.

* When allowed, you can set form delay (in seconds) to prevent too fast form sending (mostly by robots). You can add custom error message (will be shown in general error message box above form).
* You can add antispam field label and error message for non JavaScript enabled browsers.
 * If JavaScript is working, antispam field is automatically hidden and cleared.

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

A notification of sent form can be send to provided email address.


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

## Hacking a form component

Sometimes there is a need to have more than one contact form. As this plugin is meant to be as simple as possible, these multiform functions are little hacks :)

#### Override notification email options
You can set different email address to which notification about Contact Form sent will be delivered and also change a notification template.

*Template must exist in Settings > Mail > Mail configuration*.

If you add a locale string to ````notification_template```` property (like ````notification_template_en````) than that one has priority and will be used if  ````App::getLocale()```` returns ````en````.

````
[contactForm salesForm]
notification_address_to = 'sales@domain.com'
notification_template = 'notification-sales'
notification_template_en = 'notification-sales-en'
notification_template_cs = 'notification-sales-cs
````

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


----
> My thanks goes to:    
> [OctoberCMS](http://www.octobercms.com) team members and supporters for this great system.   
> [Andrew Measham](https://unsplash.com/@andrewmeasham) for his photo.   
> [Font Awesome](http://fontawesome.io/icons/) for nice icons.


Created by [Jan Vince](http://www.vince.cz), freelance web designer from Czech Republic.
