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


    public function storeFormData($data){

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

            // if email field is assigned in auto reply, save it separatelly
            if(empty($email_field_value) and $key == Settings::getTranslated('autoreply_email_field')){
                $email_field_value = e($value['value']);
            }

            // if name field is assigned in auto reply, save it separatelly
            if(empty($name_field_value) and $key == Settings::getTranslated('autoreply_name_field')){
                $name_field_value = e($value['value']);
            }

            // if message is assigned in auto reply, save it separatelly
            if(empty($message_field_value) and $key == Settings::getTranslated('autoreply_message_field')){
                $message_field_value = e($value['value']);
            }

        }

        $this->form_data = $output;
        $this->name = $name_field_value;
        $this->email = $email_field_value;
        $this->message = $message_field_value;
        $this->remote_ip = Request::ip();
        $this->save();

    }

    /**
     * Build and send auto reply message
     */
    public function sendAutoreplyEmail($postData){

        if(!Settings::getTranslated('allow_autoreply')) {
            return;
        }

        if(!Settings::getTranslated('autoreply_email_field')) {
            Log::error('SMALL CONTACT FORM ERROR: Contact form data have no email to send auto reply message!');
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
            Log::error('SMALL CONTACT FORM ERROR: Email to send auto reply is not valid!' . PHP_EOL . ' Data: '. json_encode($postData) );
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

        $template = Settings::getTranslatedTemplates('en', App::getLocale(), 'autoreply');

        if( Settings::getTranslated('email_template') ){

            if(View::exists(Settings::getTranslated('email_template')) OR !empty( MailTemplate::listAllTemplates()[Settings::getTranslated('email_template')] ) ) {
                $template = Settings::getTranslated('email_template');
            } else {
                Log::error('SMALL CONTACT FORM: Missing defined email template: ' . Settings::getTranslated('email_template') . '. Default template will be used!');
            }

        }

        Mail::{$method}($template, ['fields' => $output, 'fieldsDetails' => $outputFull], function($message) use($sendTo){

            $message->to($sendTo);

            if( Settings::getTranslated('email_subject') ){
                $message->subject(Settings::getTranslated('email_subject'));
            }

            // From address
            if( Settings::getTranslated('email_address_from') ) {
                $message->from(Settings::getTranslated('email_address_from'), Settings::getTranslated('email_address_from_name'));
            }

        });

    }

    /**
     * Build and send notification message
     */
    public function sendNotificationEmail($postData){

        if(!Settings::getTranslated('allow_notifications')) {
            return;
        }

        $sendTo =  Settings::getTranslated('notification_address_to') ;

        $validator = Validator::make(['email' => $sendTo], ['email' => 'required|email']);

        if($validator->fails()){
            Log::error('SMALL CONTACT FORM ERROR: Notification email address is invalid! No notifications will be delivered!');
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

        $template = Settings::getTranslatedTemplates('en', App::getLocale(), 'notification');

        if( Settings::getTranslated('notification_template') ){

            if(View::exists(Settings::getTranslated('notification_template')) OR !empty( MailTemplate::listAllTemplates()[Settings::getTranslated('notification_template')] ) ) {
                $template = Settings::getTranslated('notification_template');
            } else {
                Log::error('SMALL CONTACT FORM: Missing defined email template: ' . Settings::getTranslated('notification_template') . '. Default template will be used!');
            }

        }


        Mail::{$method}($template, ['fields' => $output, 'fieldsDetails' => $outputFull], function($message) use($sendTo){

            $message->to($sendTo);

            // From address
            if( Settings::getTranslated('email_address_from') ) {
                $message->from(Settings::getTranslated('email_address_from'), Settings::getTranslated('email_address_from_name'));
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
