<?php namespace JanVince\SmallContactForm\Components;

use Cms\Classes\ComponentBase;
use JanVince\SmallContactForm\Models\Settings;
use JanVince\SmallContactForm\Models\Message;

use Validator;
use Illuminate\Support\MessageBag;
use Redirect;
use Request;
use Input;
use Session;
use Flash;
use Form;
use Log;
use App;
use Twig;
use ReCaptcha\ReCaptcha;


class SmallContactForm extends ComponentBase
{

  private $validationRules;
  private $validationMessages;
  private $validationReCaptchaServerName;

  private $postData = [];
  private $post;

  private $errorAutofocus;

  private $formDescription;
  private $formDescriptionOverride;

  private $formRedirect;
  private $formRedirectOverride;

    public function componentDetails() {
        return [
            'name'        => 'janvince.smallcontactform::lang.controller.contact_form.name',
            'description' => 'janvince.smallcontactform::lang.controller.contact_form.description'
        ];
    }

    public function defineProperties(){

        return [

            'form_description'      => [
                'title'       => 'janvince.smallcontactform::lang.components.properties.form_description',
                'description' => 'janvince.smallcontactform::lang.components.properties.form_description_comment',
                'type'        => 'string',
                'default'     => null,
            ],

            'disable_fields'      => [
                'title'       => 'janvince.smallcontactform::lang.components.properties.disable_fields',
                'description' => 'janvince.smallcontactform::lang.components.properties.disable_fields_comment',
                'type'        => 'string',
                'default'     => null,
                'group'       => 'janvince.smallcontactform::lang.components.groups.override_form',
            ],
            'send_btn_label'      => [
              'title'       => 'janvince.smallcontactform::lang.components.properties.send_btn_label',
              'description' => 'janvince.smallcontactform::lang.components.properties.send_btn_label_comment',
              'type'        => 'string',
              'default'     => null,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_form',
            ],
            'form_success_msg'      => [
              'title'       => 'janvince.smallcontactform::lang.components.properties.form_success_msg',
              'description' => 'janvince.smallcontactform::lang.components.properties.form_success_msg_comment',
              'type'        => 'string',
              'default'     => null,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_form',
            ],
            'form_error_msg'      => [
              'title'       => 'janvince.smallcontactform::lang.components.properties.form_error_msg',
              'description' => 'janvince.smallcontactform::lang.components.properties.form_error_msg_comment',
              'type'        => 'string',
              'default'     => null,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_form',
            ],


            'disable_notifications'      => [
                'title'       => 'janvince.smallcontactform::lang.components.properties.disable_notifications',
                'description' => 'janvince.smallcontactform::lang.components.properties.disable_notifications_comment',
                'type'        => 'checkbox',
                'default'     => false,
                'group'       => 'janvince.smallcontactform::lang.components.groups.override_notifications',
            ],
            'notification_address_to'      => [
                'title'       => 'janvince.smallcontactform::lang.components.properties.notification_address_to',
                'description' => 'janvince.smallcontactform::lang.components.properties.notification_address_to_comment',
                'type'        => 'string',
                'default'     => null,
                'group'       => 'janvince.smallcontactform::lang.components.groups.override_notifications',
            ],
            'notification_address_from'      => [
                'title'       => 'janvince.smallcontactform::lang.components.properties.notification_address_from',
                'description' => 'janvince.smallcontactform::lang.components.properties.notification_address_from_comment',
                'type'        => 'string',
                'default'     => null,
                'group'       => 'janvince.smallcontactform::lang.components.groups.override_notifications',
            ],
            'notification_address_from_name'      => [
                'title'       => 'janvince.smallcontactform::lang.components.properties.notification_address_from_name',
                'description' => 'janvince.smallcontactform::lang.components.properties.notification_address_from_name_comment',
                'type'        => 'string',
                'default'     => null,
                'group'       => 'janvince.smallcontactform::lang.components.groups.override_notifications',
            ],
            'notification_template'      => [
                'title'       => 'janvince.smallcontactform::lang.components.properties.notification_template',
                'description' => 'janvince.smallcontactform::lang.components.properties.notification_template_comment',
                'type'        => 'string',
                'default'     => null,
                'group'       => 'janvince.smallcontactform::lang.components.groups.override_notifications',
            ],
            'notification_subject'      => [
              'title'       => 'janvince.smallcontactform::lang.components.properties.notification_subject',
              'description' => 'janvince.smallcontactform::lang.components.properties.notification_subject_comment',
              'type'        => 'string',
              'default'     => null,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_notifications',
            ],


            'disable_autoreply'      => [
              'title'       => 'janvince.smallcontactform::lang.components.properties.disable_autoreply',
              'description' => 'janvince.smallcontactform::lang.components.properties.disable_autoreply_comment',
              'type'        => 'checkbox',
              'default'     => false,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_autoreply',
            ],
            'autoreply_address_from'      => [
                'title'       => 'janvince.smallcontactform::lang.components.properties.autoreply_address_from',
                'description' => 'janvince.smallcontactform::lang.components.properties.autoreply_address_from_comment',
                'type'        => 'string',
                'default'     => null,
                'group'       => 'janvince.smallcontactform::lang.components.groups.override_autoreply',
            ],
            'autoreply_address_from_name'      => [
                'title'       => 'janvince.smallcontactform::lang.components.properties.autoreply_address_from_name',
                'description' => 'janvince.smallcontactform::lang.components.properties.autoreply_address_from_name_comment',
                'type'        => 'string',
                'default'     => null,
                'group'       => 'janvince.smallcontactform::lang.components.groups.override_autoreply',
            ],
            'autoreply_address_replyto'      => [
              'title'       => 'janvince.smallcontactform::lang.components.properties.autoreply_address_replyto',
              'description' => 'janvince.smallcontactform::lang.components.properties.autoreply_address_replyto_comment',
              'type'        => 'string',
              'default'     => null,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_autoreply',
            ],
            'autoreply_template'      => [
                'title'       => 'janvince.smallcontactform::lang.components.properties.autoreply_template',
                'description' => 'janvince.smallcontactform::lang.components.properties.autoreply_template_comment',
                'type'        => 'string',
                'default'     => null,
                'group'       => 'janvince.smallcontactform::lang.components.groups.override_autoreply',
            ],
            'autoreply_subject'      => [
                'title'       => 'janvince.smallcontactform::lang.components.properties.autoreply_subject',
                'description' => 'janvince.smallcontactform::lang.components.properties.autoreply_subject_comment',
                'type'        => 'string',
                'default'     => null,
                'group'       => 'janvince.smallcontactform::lang.components.groups.override_autoreply',
            ],

            'allow_redirect'      => [
              'title'       => 'janvince.smallcontactform::lang.settings.redirect.allow_redirect',
              'description' => 'janvince.smallcontactform::lang.settings.redirect.allow_redirect_comment',
              'type'        => 'checkbox',
              'default'     => false,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_redirect',
            ],

            'redirect_url'      => [
              'title'       => 'janvince.smallcontactform::lang.settings.redirect.redirect_url',
              'description' => 'janvince.smallcontactform::lang.settings.redirect.redirect_url_comment',
              'type'        => 'string',
              'default'     => null,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_redirect',
            ],

            'redirect_url_external'      => [
              'title'       => 'janvince.smallcontactform::lang.settings.redirect.redirect_url_external',
              'description' => 'janvince.smallcontactform::lang.settings.redirect.redirect_url_external_comment',
              'type'        => 'checkbox',
              'default'     => false,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_redirect',
            ],

            'ga_success_event_allow'      => [
              'title'       => 'janvince.smallcontactform::lang.settings.ga.ga_success_event_allow',
              'type'        => 'checkbox',
              'default'     => false,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_ga',
            ],

            'ga_success_event_category'      => [
              'title'       => 'janvince.smallcontactform::lang.settings.form_fields.event_category',
              'type'        => 'string',
              'default'     => null,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_ga',
            ],

            'ga_success_event_action'      => [
              'title'       => 'janvince.smallcontactform::lang.settings.form_fields.event_action',
              'type'        => 'string',
              'default'     => null,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_ga',
            ],

            'ga_success_event_label'      => [
              'title'       => 'janvince.smallcontactform::lang.settings.form_fields.event_label',
              'type'        => 'string',
              'default'     => null,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_ga',
            ],

            'form_notes'      => [
              'title'       => 'janvince.smallcontactform::lang.settings.form.notes',
              'type'        => 'string',
              'default'     => null,
              'group'       => 'janvince.smallcontactform::lang.components.groups.override_notes',
            ],

        ];

    }

    public function onRun() {

      $this->page['currentLocale'] = App::getLocale();
      
      $this->page['formSentAlias'] = Session::get('formSentAlias', null);
      $this->page['formError'] = Session::get('formError', null);
      $this->page['formSuccess'] = Session::get('formSuccess', null);

      $this->formDescription = $this->property('form_description');
      $this->formRedirect = $this->property('redirect_url');

      // Inject CSS assets if required
      if(Settings::getTranslated('add_assets') && Settings::getTranslated('add_css_assets')){
        $this->addCss('/modules/system/assets/css/framework.extras.css');
        $this->addCss('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
      }

      // Inject JS assets if required
      if(Settings::getTranslated('add_assets') && Settings::getTranslated('add_js_assets')){
        $this->addJs('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
        $this->addJs('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
        $this->addJs('/modules/system/assets/js/framework.js');
        $this->addJs('/modules/system/assets/js/framework.extras.js');
      }

    }

    public function onRender() {

      // Component markup parameters are accesible only from onRender method!
      if($this->formDescription != $this->property('form_description') ) {
          $this->formDescriptionOverride = $this->property('form_description');
      }

      if($this->formRedirect != $this->property('redirect_url') ) {
          $this->formRedirectOverride = $this->property('redirect_url');
      }

    }

  /**
   * Form handler
   */
  public function onFormSend(){

    /**
     * Do not allow plaint POST when AJAX is enabled and POST disabled in Settings
     */

    if(Settings::get('form_allow_ajax', null) and Settings::get('form_disable_plain_post', null) and !Request::ajax())
    {
      return Redirect::refresh();
    }

    /**
     * Validation
     */
    $this->setFieldsValidationRules();
    $this->validationReCaptchaServerName = $_SERVER['SERVER_NAME'] == "127.0.0.1" ? "localhost" : $_SERVER['SERVER_NAME'];
    $errors = [];

    $this->post = Input::all();

    // IP protection is enabled (has highest priority)
    // But privacy must allow messages saving
    if( Settings::getTranslated('add_ip_protection') and !Settings::getTranslated('privacy_disable_messages_saving') ) {

      $max = ( Settings::getTranslated('add_ip_protection_count') ? intval(Settings::getTranslated('add_ip_protection_count')) : intval(e(trans('janvince.smallcontactform::lang.settings.antispam.add_ip_protection_count_placeholder'))) );

      if( empty($max) ) {
        $max = 3;
      }

      $currentIp = Request::ip();

      if( empty($currentIp) ) {
        Log::error('SMALL CONTACT FORM ERROR: Could not get remote IP address!');
        $errors[] = e(trans('janvince.smallcontactform::lang.settings.antispam.add_ip_protection_error_get_ip'));
      } else {

        $message = new Message;

        if($message->testIPAddress($currentIp) >= $max) {
          $errors[] = ( Settings::getTranslated('add_ip_protection_error_too_many_submits') ? Settings::getTranslated('add_ip_protection_error_too_many_submits') : e(trans('janvince.smallcontactform::lang.settings.antispam.add_ip_protection_error_too_many_submits_placeholder')) );
        }

      }

    }

    // Antispam validation if allowed
    if( Settings::getTranslated('add_antispam')) {
      $this->validationRules[('_protect-' . $this->alias)] = 'size:0';

      if( !empty($this->post['_form_created']) ) {

        try {
          $delay = ( Settings::getTranslated('antispam_delay') ? intval(Settings::getTranslated('antispam_delay')) : intval(e(trans('janvince.smallcontactform::lang.settings.antispam.antispam_delay_placeholder'))) );

          if(!$delay) {
            $delay = 5;
          }

          $formCreatedTime = strtr(Input::get('_form_created'), 'jihgfedcba', '0123456789');

          $this->post['_form_created'] = intval($formCreatedTime) + $delay;

          $this->validationRules['_form_created'] = 'numeric|max:' . time();
        }
        catch (\Exception $e)
        {
            Log::error($e->getMessage());
            $errors[] = e(trans('janvince.smallcontactform::lang.settings.antispam.antispam_delay_error_msg_placeholder'));
        }
      }

    }

    //  reCaptcha validation if enabled
    if(Settings::getTranslated('add_google_recaptcha')) 
    {
        try {
            /**
             * Text if allow_url_fopen is disabled
             */
            if (!ini_get('allow_url_fopen')) 
            {
              $recaptcha = new ReCaptcha(Settings::get('google_recaptcha_secret_key'), new \ReCaptcha\RequestMethod\SocketPost());
            }
            else {
              // allow_url_fopen = On
              $recaptcha = new ReCaptcha(Settings::get('google_recaptcha_secret_key'));
            }

            $response = $recaptcha->setExpectedHostname($this->validationReCaptchaServerName)->verify(post('g-recaptcha-response'), $_SERVER['REMOTE_ADDR']);
        } 
        catch(\Exception $e) 
        {
            Log::error($e->getMessage());
            $errors[] = e(trans('janvince.smallcontactform::lang.settings.antispam.google_recaptcha_error_msg_placeholder'));
        }

        if(!$response->isSuccess()) {
            $errors[] = ( Settings::getTranslated('google_recaptcha_error_msg') ? Settings::getTranslated('google_recaptcha_error_msg') : e(trans('janvince.smallcontactform::lang.settings.antispam.google_recaptcha_error_msg_placeholder')));
        }

    }

    // Validate sent data
    $validator = Validator::make($this->post, $this->validationRules, $this->validationMessages);
    $validator->valid();
    $this->validationMessages = $validator->messages();
    $this->setPostData($validator->messages());

    if($validator->failed() or count($errors)){

      // Form main error msg (can be overriden by component property)
      if ( $this->property('form_error_msg') ) {

        $errors[] = $this->property('form_error_msg');

      } else {

        $errors[] = ( Settings::getTranslated('form_error_msg') ? Settings::getTranslated('form_error_msg') : e(trans('janvince.smallcontactform::lang.settings.form.error_msg_placeholder')));

      }

      // Validation error msg for Antispam field
      if( empty($this->postData[('_protect' . $this->alias)]['error']) && !empty($this->postData['_form_created']['error']) ) {
        $errors[] = ( Settings::getTranslated('antispam_delay_error_msg') ? Settings::getTranslated('antispam_delay_error_msg') : e(trans('janvince.smallcontactform::lang.settings.antispam.antispam_delay_error_msg_placeholder')));
      }

      Flash::error(implode(PHP_EOL, $errors));
            
      if (Request::ajax()) {
        
        $this->page['formSentAlias'] = $this->alias;
        $this->page['formError'] = true;
        $this->page['formSuccess'] = null;

      } else {
        
        Session::flash('formSentAlias', $this->alias);
        Session::flash('formError', true);

      }

      // Fill hidden fields if request has errors to maintain
      $this->formDescriptionOverride = post('_form_description');
      $this->formRedirectOverride = post('_form_redirect');

    } else {

      // Form main success msg (can be overriden by component property)
      if ($this->property('form_success_msg')) {
        
        $successMsg = $this->property('form_success_msg');
        
      } else {
        
        $successMsg = ( Settings::getTranslated('form_success_msg') ? Settings::getTranslated('form_success_msg') : e(trans('janvince.smallcontactform::lang.settings.form.success_msg_placeholder')) );
        
      }

      $message = new Message;
      $formNotes = ( $this->property('form_notes') ? $this->property('form_notes') : Settings::getTranslated('form_notes') );

      // Store data in DB
      $formDescription = !empty($this->post['_form_description']) ? e($this->post['_form_description']) : $this->property('form_description');
      $messageObject = $message->storeFormData($this->postData, $this->alias, $formDescription, $formNotes);
      
      // Send autoreply
      $message->sendAutoreplyEmail($this->postData, $this->getProperties(), $this->alias, $formDescription, $messageObject, $formNotes);

      // Send notification
      $message->sendNotificationEmail($this->postData, $this->getProperties(), $this->alias, $formDescription, $messageObject, $formNotes);

      /**
       * Flash messages
       */
      Flash::success($successMsg);

      if (Request::ajax()) {

        $this->postData = [];
        $this->page['formSentAlias'] = $this->alias;
        $this->page['formSuccess'] = true;
        $this->page['formError'] = null;

      } else {

        Session::flash('formSentAlias', $this->alias);
        Session::flash('formSuccess', true);

      }

      /**
       * Keep properties overrides after Ajax request (onRender method is not called)
       */
      if (Request::ajax()) {

        $this->formDescriptionOverride = post('_form_description');
        $this->formRedirectOverride = post('_form_redirect');

      }

      /**
       *  Redirects
       *  
       * Redirect to defined page or to prevent repeated sending of form
       * Clear data after success AJAX send
       */
      if( Settings::getTranslated('allow_redirect') or $this->property('allow_redirect') ) {

        // Component markup parameter (eg. {{ component 'contactForm' redirect_url = '/form-success-'~page.id }} ) overrides component property
        if(!empty($this->post['_form_redirect'])) {

          $propertyRedirectUrl = e($this->post['_form_redirect']);

        } else {

          $propertyRedirectUrl = $this->property('redirect_url');

        }

        // If redirection is allowed but no URL provided, just refresh (if not AJAX)
        if(empty($propertyRedirectUrl) and empty(Settings::getTranslated('redirect_url'))) {
          
          Log::warning('SCF: Form redirect is allowed but no URL was provided!');

          if (!Request::ajax()) {

            return Redirect::refresh();
            
          } else {

            return;

          }

        }

        // Overrides take precedence
        if( !empty(Settings::getTranslated('redirect_url_external')) and !empty($this->property('redirect_url_external')) ) {

          $path = $propertyRedirectUrl ? $propertyRedirectUrl : Settings::getTranslated('redirect_url');

        } else {

          $path = $propertyRedirectUrl ? url($propertyRedirectUrl) : url(Settings::getTranslated('redirect_url'));

        }

        return Redirect::to($path);

      } else {

        if (!Request::ajax()) {

          return Redirect::refresh();

        }

      }

    }

  }

  /**
   * Get plugin settings
   * Twig access: contactForm.fields
   * @return array
   */
  public function fields(){

    $fields = Settings::getTranslated('form_fields', []);

    if( !empty($this->property('disable_fields')) ) {

        $disabledFields = explode( '|', $this->property('disable_fields') );

        if(!is_array($disabledFields)) {
            return $fields;
        }

        foreach ($fields as $key => $value) {

            if( isset($value['name']) and in_array(trim($value['name']), $disabledFields) ) {
                unset($fields[$key]);
            }

        }

    }

    return $fields;
  }

  /**
   * Get form attributes
   */
  public function getFormAttributes(){

    $attributes = [];

    $attributes['request'] = $this->alias . '::onFormSend';
    $attributes['files'] = true;
    
    // Disabled hard coded hash URL in 1.41.0 as dynamic redirect is now available
    if ( empty(Settings::getTranslated('allow_redirect', null) ) ) {
      $attributes['url'] = '#scf-' . $this->alias;
    }
    
    $attributes['method'] = 'POST';
    $attributes['class'] = null;
    $attributes['id'] = 'scf-form-id-' . $this->alias;

    if( Settings::getTranslated('form_allow_ajax', 0) ) {

      $attributes['data-request'] = $this->alias . '::onFormSend';
      $attributes['data-request-validate'] = 'data-request-validate';
      $attributes['data-request-files'] = 'data-request-files';
      $attributes['data-request-update'] = "'". $this->alias ."::scf-message':'#scf-message-". $this->alias ."','". $this->alias ."::scf-form':'#scf-form-". $this->alias ."'";
      
      if( Settings::get('add_google_recaptcha') ) {
            $attributes['data-request-complete'] = "onloadCallback_" . $this->alias . '();';
      }

    }

    if( Settings::getTranslated('form_css_class') ) {
        $attributes['class'] .= Settings::getTranslated('form_css_class');
    }

    if( !empty(Input::all()) ) {
      $attributes['class'] .= ' was-validated';
    }

    if( Settings::getTranslated('form_send_confirm_msg') and Settings::getTranslated('form_allow_confirm_msg') ) {

      $attributes['data-request-confirm'] = Settings::getTranslated('form_send_confirm_msg');

    }

    // Disable browser validation if enabled
    if(!empty(Settings::getTranslated('form_disable_browser_validation'))){
      $attributes['novalidate'] = "novalidate";
    }

    return $attributes;

  }

  /**
   * Generate field HTML code
   * @return string
   */
  public function getFieldHtmlCode(array $fieldSettings){

    if(empty($fieldSettings['name']) && empty($fieldSettings['type'])){
      return NULL;
    }

    $fieldType = Settings::getFieldTypes($fieldSettings['type']);
    $fieldRequired = $this->isFieldRequired($fieldSettings);

    // If there is a custom code, return it only
    if( !empty($fieldSettings['type']) and $fieldSettings['type'] == 'custom_code' and !empty($fieldSettings['field_custom_code']) ) {

      if( !empty($fieldSettings['field_custom_code_twig']) ) {
        return(Twig::parse($fieldSettings['field_custom_code']));
      } else {
        return($fieldSettings['field_custom_code']);
      }
    }

    $output = [];

    $wrapperCss = ( $fieldSettings['wrapper_css'] ? $fieldSettings['wrapper_css'] : $fieldType['wrapper_class'] );
    
    // Add wrapper error class if there are any
    if(!empty($this->postData[$fieldSettings['name']]['error'])){
      $wrapperCss .= ' has-error';
    }

    $output[] = '<div class="' . $wrapperCss . '">';

      // Checkbox wrapper
      if ($fieldSettings['type'] == 'checkbox') {
        $output[] = '<div class="checkbox">';
      }

      // Label classic
      if( !empty($fieldSettings['label']) and !empty($fieldType['label']) ){
        $output[] = '<label class="control-label ' . ( !empty($fieldSettings['label_css']) ? $fieldSettings['label_css'] : '' ) . ' ' . ( $fieldRequired ? 'required' : '' ) . '" for="' . ($this->alias . '-' . $fieldSettings['name']) . '" ' . (Settings::getTranslated('form_use_placeholders') ? ' style="display: none;" ' : '') . '>' . Settings::getDictionaryTranslated($fieldSettings['label']) . '</label>';
      }

      // Label as container
      if( !empty($fieldSettings['label']) and empty($fieldType['label']) ){
        $output[] = '<label class="' . ( !empty($fieldSettings['label_css']) ? $fieldSettings['label_css'] : '' ) . '">';
      }


      // Add help-block if there are errors
      if(!empty($this->postData[$fieldSettings['name']]['error'])){
        $output[] = '<small class=" invalid-feedback">' . $this->postData[$fieldSettings['name']]['error'] . "</small>";
      }

      // Field attributes
      $attributes = [
        'id' => $this->alias . '-' . $fieldSettings['name'],
        'class' => null
      ];

      $tagClass = $fieldSettings['field_css'] ? $fieldSettings['field_css'] : $fieldType['field_class'];

      if(!empty($tagClass)) {
        $attributes['class'] = $tagClass;
      }

      if(!empty($fieldType['use_name_attribute'])) {
        $attributes['name'] = $fieldSettings['name'];
      }

      if ( !empty($this->postData[$fieldSettings['name']]['value']) && empty($fieldType['html_close']) ) {

        if ($fieldSettings['type'] == 'checkbox') { 
          $attributes['checked'] = null;
        } else {
          $attributes['value'] = $this->postData[$fieldSettings['name']]['value'];
        }
      }

      // Placeholders if enabled
      if(Settings::getTranslated('form_use_placeholders') and !in_array($fieldSettings['type'], ['checkbox', 'dropdown', 'custom_content'])){
        $attributes['placeholder'] = Settings::getDictionaryTranslated($fieldSettings['label']);
      }

      // Autofocus only when no error
      if(!empty($fieldSettings['autofocus']) && !Flash::error()){
        $attributes['autofocus'] = NULL;
      }

      // Add custom attributes from field settings
      if(!empty($fieldType['attributes'])){
        $attributes = array_merge($attributes, $fieldType['attributes']);
      }

      // Add error class if there are any and autofocus field
      if(!empty($this->postData[$fieldSettings['name']]['error'])){
        $attributes['class'] = $attributes['class'] . ' error is-invalid';

        if(empty($this->errorAutofocus)){
          $attributes['autofocus'] = NULL;
          $this->errorAutofocus = true;
        }

      }

      if($fieldRequired){
        $attributes['required'] = NULL;
      }


      $output[] = '<' . $fieldType['html_open'] . ' ' . $this->formatAttributes($attributes) . '>';

      // For dropdown add options
      if( $fieldSettings['type'] == 'dropdown' && count($fieldSettings['field_values']) ) {

        $valuesCounter = 1;
        
        foreach($fieldSettings['field_values'] as $fieldValue) {

          if( !empty($this->postData[$fieldSettings['name']]['value']) && $this->postData[$fieldSettings['name']]['value'] == $fieldValue['field_value_id'] ){
            $optionAttribute = 'selected';
          } else {
            $optionAttribute = null;
          }

          $output[] = "<option $optionAttribute value='" . $fieldValue['field_value_id'] . "'>" . $fieldValue['field_value_content'] . "</option>";

          $valuesCounter++;

        }

      }
      // For pair tags insert value between
      if(!empty($this->postData[$fieldSettings['name']]['value']) && !empty($fieldType['html_close'])){
        $output[] = $this->postData[$fieldSettings['name']]['value'];
      }

      // For tags without label put text inline
      if( empty( $fieldType['label'] ) ){
        $output[] = Settings::getDictionaryTranslated($fieldSettings['label']);
      }

      // If there is a custom content
      if (!empty($fieldSettings['type']) and $fieldSettings['type'] == 'custom_content' and !empty($fieldSettings['field_custom_content'])) {
        $output[] = $fieldSettings['field_custom_content'];
      }

      if(!empty($fieldType['html_close'])){
        $output[] = '</' . $fieldType['html_close'] . '>';
      }

      // Label as container
      if( !empty($fieldSettings['label']) and empty($fieldType['label']) ){
        $output[] = '</label>';
      }

      // Checkbox wrapper
      if ($fieldSettings['type'] == 'checkbox') {
        $output[] = '</div>';
      }

    $output[] = "</div>";

    return(implode('', $output));

  }

  /**
   * Generate antispam field HTML code
   * @return string
   */
  public function getAntispamFieldHtmlCode(){

    if( !Settings::getTranslated('add_antispam') ){
      return NULL;
    }

    $output = [];

    $output[] = '<div id="_protect-wrapper-' . $this->alias . '" class="form-group _protect-wrapper' . (Input::get('_protect-'.$this->alias) ? 'has-error' : '') . '">';

      $output[] = '<label class="control-label">' . ( Settings::getTranslated('antispam_label') ? Settings::getTranslated('antispam_label') : e(trans('janvince.smallcontactform::lang.settings.antispam.antispam_label_placeholder'))  ) . '</label>';

      $output[] = '<input type="hidden" name="_form_created" value="' . strtr(time(), '0123456789', 'jihgfedcba') . '">';

      // Add help-block if there are errors
      if(!empty($this->postData[('_protect'.$this->alias)]['error'])){
        $output[] = '<small class="help-block">' . ( Settings::getTranslated('antispam_error_msg') ? Settings::getTranslated('antispam_error_msg') : e(trans('janvince.smallcontactform::lang.settings.antispam.antispam_error_msg_placeholder'))  ) . "</small>";
      }

      // Field attributes
      $attributes = [
        'id' => '_protect-'.$this->alias,
        'name' => '_protect',
        'class' => '_protect form-control',
        'value' => 'http://',
      ];

      // Add error class if field is not empty
      if( Input::get('_protect-'.$this->alias) ){
        $attributes['class'] = $attributes['class'] . ' error';

        if(empty($this->errorAutofocus)){
          $attributes['autofocus'] = NULL;
          $this->errorAutofocus = true;
        }

      }

      $output[] = '<input ' . $this->formatAttributes($attributes) . '>';

    $output[] = "</div>";

    $output[] = "
      <script>
        var protectedDivs = document.querySelectorAll('#_protect-" . $this->alias . "');
        protectedDivs.forEach((item) => {
          item.setAttribute('value', '');
        });
        
        var wrapperDivs = document.querySelectorAll('#_protect-wrapper-" . $this->alias . "');
        wrapperDivs.forEach((item) => {
          item.style.display = 'none';
        });
        
      </script>
    ";

    return(implode('', $output));

  }


  /**
   * Generate description field HTML code
   * @return string
   */
  public function getDescriptionFieldHtmlCode(){

    if( !$this->formDescriptionOverride ){
      return NULL;
    }

    $output = [];

    // Field attributes
    $attributes = [
        'id' => '_form_description-'.$this->alias,
        'type' => 'hidden',
        'name' => '_form_description',
        'class' => '_form_description form-control',
        'value' => $this->formDescriptionOverride,
      ];

    $output[] = '<input ' . $this->formatAttributes($attributes) . '>';

    return(implode('', $output));

  }

  /**
   * Generate redirect field HTML code
   * @return string
   */
  public function getRedirectFieldHtmlCode(){

    if (empty(Settings::getTranslated('allow_redirect')) and empty($this->property('allow_redirect'))) {
      return NULL;
    }

    if( !$this->formRedirectOverride ){
      return NULL;
    }

    $output = [];

    // Field attributes
    $attributes = [
        'id' => '_form_redirect-'.$this->alias,
        'type' => 'hidden',
        'name' => '_form_redirect',
        'class' => '_form_redirect form-control',
        'value' => $this->formRedirectOverride,
      ];

    $output[] = '<input ' . $this->formatAttributes($attributes) . '>';

    return(implode('', $output));

  }

  /**
   * Generate success GA event field HTML code
   * @return string
   */
  public function getGaSuccessEventHtmlCode($addScriptTag = false)
  {

    // If GA success event is not allowed
    if (empty(Settings::getTranslated('ga_success_event_allow')) and empty($this->property('ga_success_event_allow'))) {
      return;
    }

    $output = [];

    // Field attributes
    $attributes = [
      'hitType' => 'event',
      'eventCategory' => ($this->property('ga_success_event_category') ? e($this->property('ga_success_event_category')) : Settings::getTranslated('ga_success_event_category')),
      'eventAction' => ($this->property('ga_success_event_action') ? e($this->property('ga_success_event_action')) : Settings::getTranslated('ga_success_event_action')),
      'eventLabel' => ($this->property('ga_success_event_label') ? e($this->property('ga_success_event_label')) : Settings::getTranslated('ga_success_event_label')),
    ];

    $attributesGtag = [
      'event_category' => ($this->property('ga_success_event_category') ? e($this->property('ga_success_event_category')) : Settings::getTranslated('ga_success_event_category')),
      'event_label' => ($this->property('ga_success_event_label') ? e($this->property('ga_success_event_label')) : Settings::getTranslated('ga_success_event_label')),
    ];

    if($addScriptTag) {
      $output[] = "<script>";
    }

    switch(Settings::getTranslated('ga_success_event_gtag'))
    {

      case 'gtag':
        $output[] = "gtag('".$attributes['hitType']."', '".$attributes['eventAction']."', { event_category: '" . $attributesGtag['event_category'] . "', event_label: '". $attributesGtag['event_label'] ."' }); ";
        break;

      default:
        $output[] = "ga('send', { " . $this->formatAttributes($attributes, true) . " }); ";
        break;
    }


    if ($addScriptTag) {
      $output[] = "</script>";
    }

    return (implode('', $output));
  }

  /**
   * Generate submit button field HTML code
   * @return string
   */
  public function getSubmitButtonHtmlCode(){

    if( !count($this->fields()) ){
      return e(trans('janvince.smallcontactform::lang.controller.contact_form.no_fields'));
    }

    $output = [];

    $wrapperCss = ( Settings::getTranslated('send_btn_wrapper_css') ? Settings::getTranslated('send_btn_wrapper_css') : e(trans('janvince.smallcontactform::lang.settings.buttons.send_btn_wrapper_css_placeholder')) );

    $output[] = '<div id="submit-wrapper-' . $this->alias . '" class="' . $wrapperCss . '">';

      $output[] = '<button id="submit-button-' . $this->alias . '" type="submit" data-attach-loading class="oc-loader ' . ( Settings::getTranslated('send_btn_css_class') ? Settings::getTranslated('send_btn_css_class') : e(trans('janvince.smallcontactform::lang.settings.buttons.send_btn_css_class_placeholder')) ) . '"' . '>';

      if ($this->property('send_btn_label')) {

        $output[] = $this->property('send_btn_label');

      } else {

        $output[] = ( Settings::getTranslated('send_btn_text') ? Settings::getTranslated('send_btn_text') : e(trans('janvince.smallcontactform::lang.settings.buttons.send_btn_text_placeholder')) );

      }

      $output[] = '</button>';

    $output[] = "</div>";

    return(implode('', $output));

  }

  /**
   * Get reCaptcha wrapper class
   * @return string
   */
  public function getReCaptchaWrapperClass(){

    $wrapperCss = ( Settings::getTranslated('google_recaptcha_wrapper_css') ? Settings::getTranslated('google_recaptcha_wrapper_css') : e(trans('janvince.smallcontactform::lang.settings.antispam.google_recaptcha_wrapper_css_placeholder')) );

    return $wrapperCss;

  }

  /**
   * Generate validation rules and messages
   */
  private function setFieldsValidationRules(){

    $fieldsDefinition = $this->fields();

    $validationRules = [];
    $validationMessages = [];
    foreach($fieldsDefinition as $field){
      
      if(!empty($field['validation'])) {
        $rules = [];
        
        foreach($field['validation'] as $rule) {
          
          if( $rule['validation_type']=='custom' && !empty($rule['validation_custom_type']) ){

            if(!empty($rule['validation_custom_pattern'])) {
              
              switch ($rule['validation_custom_type']) {

                /**
                 * Keep regex pattern in an array
                 */
                case "regex":

                  $rules[] = [$rule['validation_custom_type'], $rule['validation_custom_pattern']];

                break;

                default:

                  $rules[] = $rule['validation_custom_type'] . ':' . $rule['validation_custom_pattern'];

                break;

              }
              
              
              
            } else {
              
              $rules[] = $rule['validation_custom_type'];

            }

            if(!empty($rule['validation_error'])){

              $validationMessages[($field['name'] . '.' . $rule['validation_custom_type'] )] = Settings::getDictionaryTranslated($rule['validation_error']);
            }  

          } else {

            $rules[] = $rule['validation_type']; 

            if(!empty($rule['validation_error'])){

              $validationMessages[($field['name'] . '.' . $rule['validation_type'] )] = Settings::getDictionaryTranslated($rule['validation_error']);
            }  
        	}
        }

        $validationRules[$field['name']] = $rules;
      }
    }

    $this->validationRules = $validationRules;
    $this->validationMessages = $validationMessages;

  }


  /**
   * Generate post data with errors
   */
  private function setPostData(MessageBag $validatorMessages){

    foreach( $this->fields() as $field){

      $this->postData[ $field['name'] ] = [
        'value' => e(Input::get($field['name'])),
        'error' => $validatorMessages->first($field['name']),
      ];

    }

  }

  /**
   * Format attributes array
   * @return array
   */
  private function formatAttributes(array $attributes, $jsArray = false) {

    $output = [];

    foreach ($attributes as $key => $value) {
      $output[] = $key . ($jsArray ? ': "' : '="') . $value . '"';
    }

    return implode(($jsArray ? ', ' : ' '), $output);
  }

  /**
   * Search for required validation type
   */
  private function isFieldRequired($fieldSettings){

    if(empty($fieldSettings['validation'])){
      return false;
    }

    foreach($fieldSettings['validation'] as $rule) {
      if(!empty($rule['validation_type']) && $rule['validation_type'] == 'required'){
        return true;
      }
    }

    return false;
  }
}
