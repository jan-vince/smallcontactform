<?php namespace JanVince\SmallContactForm\Models;

use Str;
use Model;
use URL;
use October\Rain\Router\Helper as RouterHelper;
use Cms\Classes\Page as CmsPage;
use Cms\Classes\Theme;
use JanVince\SmallContactForm\Models\Settings;
use Log;
use Validator;
use Mail;
use Request;
use Carbon\Carbon;
use View;
use App;
use System\Models\MailTemplate;
use System\Classes\MailManager;


class Message extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'janvince_smallcontactform_messages';

    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];

    public $timestamps = true;

    public $rules = [];

    public $translatable = [];

    protected $guarded = [];

    protected $jsonable = ['form_data'];

    
    /**
     * Scope new messages only
     */
    public function scopeIsNew($query)
    {
        return $query->where('new_message', '=', 1);
    }

    /**
     * Scope read messages only
     */
    public function scopeIsRead($query)
    {
        return $query->where('new_message', '=', 0);
    }


    public function storeFormData($data, $formAlias, $formDescription){

        if(Settings::getTranslated('privacy_disable_messages_saving')) {
            return;
        }

        $output = [];
        $name_field_value = NULL;
        $email_field_value = NULL;
        $message_field_value = NULL;

        $formFields = Settings::getTranslated('form_fields');

        foreach($data as $key => $value) {

            // skip helpers
            if(substr($key, 0, 1) == '_'){
                continue;
            }

            // skip reCaptcha
            if($key == 'g-recaptcha-response'){
                continue;
            }

            // skip non-defined fields
            $fieldDefined = null;
            foreach( $formFields as $field) {
                if( $field['name'] == $key) {
                    $fieldDefined = true;
                }
            }

            if( !$fieldDefined ) {
                Log::warning('SMALL CONTACT FORM WARNING: Found a non-defined field in sent data! Field name: ' . e($key) . ' and value: ' . e($value['value']) );
                continue;
            }

            $output[$key] = e($value['value']);

            // if email field is assigned in autoreply, save it separatelly
            if(empty($email_field_value) and $key == Settings::getTranslated('autoreply_email_field')){
                $email_field_value = e($value['value']);
            }

            // if name field is assigned in autoreply, save it separatelly
            if(empty($name_field_value) and $key == Settings::getTranslated('autoreply_name_field')){
                $name_field_value = e($value['value']);
            }

            // if message is assigned in autoreply, save it separatelly
            if(empty($message_field_value) and $key == Settings::getTranslated('autoreply_message_field')){
                $message_field_value = e($value['value']);
            }

        }

        $this->form_data = $output;
        $this->name = $name_field_value;
        $this->email = $email_field_value;
        $this->message = $message_field_value;
        $this->remote_ip = Request::ip();
        $this->form_alias = $formAlias;
        $this->form_description = $formDescription;
        $this->save();

    }

    /**
     * Build and send autoreply message
     */
    public function sendAutoreplyEmail($postData, $componentProperties = [], $formAlias, $formDescription){

        if(!Settings::getTranslated('allow_autoreply')) {
            return;
        }

        if (!empty($componentProperties['disable_autoreply'])) {
            return;
        }

        if(!Settings::getTranslated('autoreply_email_field')) {
            Log::error('SMALL CONTACT FORM ERROR: Contact form data have no email to send autoreply message!');
            return;
        }

        /**
        *	Extract and test email field value
        */        
        $sendTo = '';

        foreach($postData as $key => $field) {
            if($key == Settings::getTranslated('autoreply_email_field')){
                $sendTo = $field['value'];
            }
        }

        $validator = Validator::make(['email' => $sendTo], ['email' => 'required|email']);

        if($validator->fails()){
            Log::error('SMALL CONTACT FORM ERROR: Email to send autoreply is not valid!' . PHP_EOL . ' Data: '. json_encode($postData) );
            return;
        }

        if( Settings::getTranslated('allow_email_queue') ){
            $method = 'queue';
        } else {
            $method = 'send';
        }

        $output = [];
        $outputFull = [];
        $formFields = Settings::getTranslated('form_fields');

        foreach($formFields as $field) {

            $fieldValue = null;

            if( !empty( $postData[ $field['name'] ]['value'] ) ) {
                $fieldValue = e( html_entity_decode( $postData[ $field['name'] ]['value']  ) );
            } else {
                $fieldValue = null;
            }

            if( !empty( $field['name'] ) ) {
                $outputFull[ $field['name'] ] = array_merge( $field, [ 'value' => $fieldValue ] );
            }

            $output[ $field['name'] ] = $fieldValue;

        }

        $output['form_description'] = $formDescription;
        $output['form_alias'] = $formAlias;

        $template = Settings::getTranslatedTemplates('en', App::getLocale(), 'autoreply');

        if( Settings::getTranslated('email_template') ){

            if(View::exists(Settings::getTranslated('email_template')) OR !empty( MailTemplate::listAllTemplates()[Settings::getTranslated('email_template')] ) ) {
                $template = Settings::getTranslated('email_template');
            } else {
                Log::error('SMALL CONTACT FORM: Missing defined email template: ' . Settings::getTranslated('email_template') . '. Default template will be used!');
            }

        }

        /**
         *  Override email template by component property
         *  Language specific template has priority (override non language specific)
         */
        if ( !empty($componentProperties['autoreply_template']) and !empty( MailTemplate::listAllTemplates()[ $componentProperties['autoreply_template'] ] ) ) {
            $template = $componentProperties['autoreply_template'];
        } elseif ( !empty($componentProperties['autoreply_template']) and empty( MailTemplate::listAllTemplates()[ $componentProperties['autoreply_template'] ] ) ) {
            Log::error('SMALL CONTACT FORM: Missing defined email template: ' . $componentProperties['autoreply_template'] . '. ' . $template . ' template will be used!');
        }

        if ( !empty($componentProperties[ ('autoreply_template_'.App::getLocale())]) and !empty( MailTemplate::listAllTemplates()[ $componentProperties[ ('autoreply_template_'.App::getLocale())] ] ) ) {
            $template =  $componentProperties[('autoreply_template_'.App::getLocale())];
        } elseif ( !empty($componentProperties[ ('autoreply_template_'.App::getLocale())]) and empty( MailTemplate::listAllTemplates()[ $componentProperties[ ('autoreply_template_'.App::getLocale())] ] ) ) {
            Log::error('SMALL CONTACT FORM: Missing defined email template: ' . $componentProperties[ ('autoreply_template_'.App::getLocale())] . '. ' . $template . ' template will be used!');
        }

        Mail::{$method}($template, ['fields' => $output, 'fieldsDetails' => $outputFull], function($message) use($sendTo, $componentProperties){

            $message->to($sendTo);

            if( Settings::getTranslated('email_subject') ){
                $message->subject(Settings::getTranslated('email_subject'));
            }

            /**
            * From address
            * Component's property can override this
            */
            $fromAddress = null;

            if( Settings::getTranslated('email_address_from') ) {
                $fromAddress = Settings::getTranslated('email_address_from');
                $fromAddressName = Settings::getTranslated('email_address_from_name');
            }

            if( !empty($componentProperties['autoreply_address_from']) ) {
                $fromAddress = $componentProperties['autoreply_address_from'];
            }

            if( !empty($componentProperties['autoreply_address_from_name']) ) {
                $fromAddressName = $componentProperties['autoreply_address_from_name'];
            }

            if( !empty($componentProperties[ ('autoreply_address_from_name_'.App::getLocale()) ]) ) {
                $fromAddressName = $componentProperties[ ('autoreply_address_from_name_'.App::getLocale()) ];
            }

            $validator = Validator::make(['email' => $fromAddress], ['email' => 'required|email']);

            if($validator->fails()){
                Log::error('SMALL CONTACT FORM ERROR: Autoreply email address is invalid (' .$fromAddress. ')! System email address and name will be used.');
                return;
            }

            $message->from($fromAddress, $fromAddressName);

        });

    }

    /**
     * Build and send notification message
     */
    public function sendNotificationEmail($postData, $componentProperties = [], $formAlias, $formDescription){

        if(!Settings::getTranslated('allow_notifications')) {
            return;
        }

        if(!empty($componentProperties['disable_notifications'])) {
            return;
        }

        $sendTo =  (!empty($componentProperties['notification_address_to']) ? $componentProperties['notification_address_to'] : Settings::getTranslated('notification_address_to') );

        $sendToAddresses = explode(',', $sendTo);        
        $sendToAddressesValidated = [];

        foreach($sendToAddresses as $sendToAddress) {

            $validator = Validator::make(['email' => trim($sendToAddress)], ['email' => 'required|email']);
    
            if($validator->fails()){
                Log::error('SMALL CONTACT FORM ERROR: Notification email address (' .trim($sendToAddress). ') is invalid! No notification will be delivered!');
            } else {
                $sendToAddressesValidated[] = trim($sendToAddress);
            }
        }

        if( !count($sendToAddressesValidated) ) {
            return;
        }

        if( Settings::getTranslated('allow_email_queue') ){
            $method = 'queue';
        } else {
            $method = 'send';
        }

        $output = [];
        $outputFull = [];
        $formFields = Settings::getTranslated('form_fields');
        $replyToAddress = null;
        $replyToName = null;

        foreach($formFields as $field) {

            $fieldValue = null;

            if( !empty( $postData[ $field['name'] ]['value'] ) ) {
                $fieldValue = e( html_entity_decode( $postData[ $field['name'] ]['value']  ) );
            } else {
                $fieldValue = null;
            }

            if( !empty( $field['name'] ) ) {
                $outputFull[ $field['name'] ] = array_merge( $field, [ 'value' => $fieldValue ] );
            }

            // If email field is assigned, prepare for replyTo
            if(empty($replyToAddress) and $field['name'] == Settings::getTranslated('autoreply_email_field') and isset($postData[$field['name']]['value'])){
                $replyToAddress = e( $postData[$field['name']]['value'] );
            }

            // If name field is assigned, prepare for fromAddress
            if(empty($replyToName) and $field['name'] == Settings::getTranslated('autoreply_name_field') and isset($postData[$field['name']]['value'])){
                $replyToName = e( $postData[$field['name']]['value'] );
            }

            $output[ $field['name'] ] = $fieldValue;

        }

        $output['form_description'] = $formDescription;
        $output['form_alias'] = $formAlias;

        $template = Settings::getTranslatedTemplates('en', App::getLocale(), 'notification');

        if( Settings::getTranslated('notification_template') ){

            if(View::exists(Settings::getTranslated('notification_template')) OR !empty( MailTemplate::listAllTemplates()[Settings::getTranslated('notification_template')] ) ) {
                $template = Settings::getTranslated('notification_template');
            } else {
                Log::error('SMALL CONTACT FORM: Missing defined email template: ' . Settings::getTranslated('notification_template') . '. Default template will be used!');
            }

        }

        /**
         *  Override email template by component property
         *  Language specific template has priority (override non language specific)
         */
        if ( !empty($componentProperties['notification_template']) and !empty( MailTemplate::listAllTemplates()[ $componentProperties['notification_template'] ] ) ) {
            $template = $componentProperties['notification_template'];
        } elseif ( !empty($componentProperties['notification_template']) and empty( MailTemplate::listAllTemplates()[ $componentProperties['notification_template'] ] ) ) {
            Log::error('SMALL CONTACT FORM: Missing defined email template: ' . $componentProperties['notification_template'] . '. ' . $template . ' template will be used!');
        }


        if ( !empty($componentProperties[ ('notification_template_'.App::getLocale())]) and !empty( MailTemplate::listAllTemplates()[ $componentProperties[ ('notification_template_'.App::getLocale())] ] ) ) {
            $template =  $componentProperties[('notification_template_'.App::getLocale())];
        } elseif ( !empty($componentProperties[ ('notification_template_'.App::getLocale())]) and empty( MailTemplate::listAllTemplates()[ $componentProperties[ ('notification_template_'.App::getLocale())] ] ) ) {
            Log::error('SMALL CONTACT FORM: Missing defined email template: ' . $componentProperties[ ('notification_template_'.App::getLocale())] . '. ' . $template . ' template will be used!');
        }

        Mail::{$method}($template, ['fields' => $output, 'fieldsDetails' => $outputFull], function($message) use($sendToAddressesValidated, $replyToAddress, $replyToName, $componentProperties){

            if( count($sendToAddressesValidated)>1 ) {
                
                foreach($sendToAddressesValidated as $address) {
                    $message->bcc($address);
                }
            } elseif( !empty($sendToAddressesValidated[0]) ) {
                $message->to($sendToAddressesValidated[0]);
            } else {
                return;
            }

            /**
            *   Set Reply to address and also set From address if requested
            */
            if ( !empty($replyToAddress) ) {

                $validator = Validator::make(['email' => $replyToAddress], ['email' => 'required|email']);

                if($validator->fails()){
                    Log::error('SMALL CONTACT FORM ERROR: Notification replyTo address is not valid (' .$replyToAddress. ')! Reply to address will not be used.');
                    return;
                }

                $message->replyTo($replyToAddress, $replyToName);

                // Force From field if requested
                if ( Settings::getTranslated('notification_address_from_form') ) {
                    $message->from($replyToAddress, $replyToName);
                }
            }

            /**
             * Set From address if defined in component property
             */
            if ( !empty($componentProperties['notification_address_from'])) {

                if (!empty($componentProperties['notification_address_from'])) {
                    $fromAddressName = $componentProperties['notification_address_from'];
                } else {
                    $fromAddressName = null;
                }

                $message->from($componentProperties['notification_address_from'], $fromAddressName);
            }

        });
    }

    /**
     * Test how many times was given IP address used this day
     * @return int
     */
    public function testIPAddress($ip){

        $today = Carbon::today();

        $count = Message::whereDate('created_at', '=', $today->toDateString())
                        ->where('remote_ip', '=', $ip)
                        ->count();

        return $count;

    }

}
