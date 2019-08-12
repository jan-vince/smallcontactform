<?php

namespace JanVince\SmallContactForm\Models;

use Model;
use App;
use System\Classes\PluginManager;

class Settings extends Model
{

    public $implement = [
        'System.Behaviors.SettingsModel',
        '@RainLab.Translate.Behaviors.TranslatableModel',
    ];

    public $translatable = [
        'form_success_msg',
        'form_error_msg',
        'form_send_confirm_msg',
        'send_btn_text',
        'form_fields',
        'antispam_delay_error_msg',
        'antispam_label',
        'antispam_error_msg',
        'add_ip_protection_error_too_many_submits',
        'email_address_from_name',
        'email_subject',
        'email_template',
        'notification_template',
        'google_recaptcha_error_msg',
    ];

    public $requiredPermissions = ['janvince.smallcontactform.access_settings'];

    public $settingsCode = 'janvince_smallcontactform_settings';

    public $settingsFields = 'fields.yaml';

    protected $jsonable = ['form_fields'];

    /**
     * Try to use Rainlab Tranlaste plugin to get translated content or falls back to default settings value
     */
    public static function getTranslated($value, $defaultValue = false){

        // Check for Rainlab.Translate plugin
        $pluginManager = PluginManager::instance()->findByIdentifier('Rainlab.Translate');

        if ($pluginManager && !$pluginManager->disabled) {

        $settings = Settings::instance();

        $valueTranslated = $settings->getAttributeTranslated($value);

            if(!empty($valueTranslated)){
                return $valueTranslated;
            } else {
                return $defaultValue;
            }

        } else {
            return Settings::get($value, $defaultValue);
        }

    }

    /**
     * Try to use Rainlab Tranlaste plugin to get translated content for given key
     */
    public static function getDictionaryTranslated($value){

        // Check for Rainlab.Translate plugin
        $translatePlugin = PluginManager::instance()->findByIdentifier('Rainlab.Translate');

        if ($translatePlugin && !$translatePlugin->disabled) {

            $params = [];

            $message = \RainLab\Translate\Models\Message::trans($value, $params);

            return $message;

        } else {
            return $value;
        }

    }



  /**
   * Generate form fields types list
   *  @return array
   */
  public function getTypeOptions($value, $formData)
  {

    $fieldTypes = $this->getFieldTypes();

    $types = [];

    if(!$fieldTypes) {
      return [];
    }

    foreach ($fieldTypes as $key => $value) {
      $types[$key] = 'janvince.smallcontactform::lang.settings.form_field_types.'.$key;
    }

    return $types;

  }

  /**
   * Generate form fields types list
   *  @return array
   */
  public function getValidationTypeOptions($value, $formData)
  {

      return [
      'required' => 'janvince.smallcontactform::lang.settings.form_field_validation.required',
      'email' => 'janvince.smallcontactform::lang.settings.form_field_validation.email',
      'numeric' => 'janvince.smallcontactform::lang.settings.form_field_validation.numeric',
      'custom' => 'janvince.smallcontactform::lang.settings.form_field_validation.custom',
    ];
  }

  /**
   * Generate list of existing fields for email name
   *  @return array
   */
  public function getAutoreplyNameFieldOptions($value, $formData)
  {

    return $this->getFieldsList('text');

  }

  /**
   * Generate list of existing fields for email name
   *  @return array
   */
  public function getAutoreplyEmailFieldOptions($value, $formData)
  {

    return $this->getFieldsList('email');

  }

  /**
   * Generate list of existing message fields
   *  @return array
   */
  public function getAutoreplyMessageFieldOptions($value, $formData)
  {

    return $this->getFieldsList('textarea');

  }

  /**
   * Generate fields list
   * @return arry
   */
  private function getFieldsList($type = false, $forceType = false){

    $output = [];
    $outputAll = [];

    foreach (Settings::getTranslated('form_fields', []) as $field) {

            $fieldName = $field['name'] . ' ['. $field ['type'] . ']';

            $outputAll[$field['name']] = $fieldName;

            if($type && !empty($field['type']) && $field['type'] <> $type) {
                continue;
            } else {
                $output[$field['name']] = $fieldName;
            }

    }

        if($forceType) {
            return $output;
        } else {
            return $outputAll;
        }

  }

  /**
   * HTML field types mapping array
   * @return array
   */
  public static function getFieldTypes($type = false) {

    $types = [

      'text' => [
        'html_open' => 'input',
        'label' => true,
        'wrapper_class' => 'form-group',
        'field_class' => 'form-control',
        'attributes' => [
          'type' => 'text',
        ],
        'html_close' => null,
      ],

      'email' => [
        'html_open' => 'input',
        'label' => true,
        'wrapper_class' => 'form-group',
        'field_class' => 'form-control',
        'attributes' => [
          'type' => 'email',
        ],
        'html_close' => null,
      ],

      'textarea' => [
        'html_open' => 'textarea',
        'label' => true,
        'wrapper_class' => 'form-group',
        'field_class' => 'form-control',
        'attributes' => [
          'rows' => 5,
        ],
        'html_close' => 'textarea',
      ],

      'checkbox' => [
        'html_open' => 'input',
        'label' => false,
        'wrapper_class' => null,
        'field_class' => null,
        'inner_label' => true,
        'attributes' => [
          'type' => 'checkbox',
          'value' => 1,
        ],
        'html_close' => null,
      ],

      'dropdown' => [
        'html_open' => 'select',
        'label' => true,
        'wrapper_class' => 'form-group',
        'field_class' => 'form-control',
        'inner_label' => false,
        'attributes' => [
        ],
        'html_close' => 'select',
      ],

    ];

    if($type){
      if(!empty($types[$type])){
        return $types[$type];
      }
    }

    return $types;

  }

    /**
    * Get non English locales from Translate plugin
    * @return array
     */
    public static function getEnabledLocales() {

        // Check for Rainlab.Translate plugin
    $pluginManager = PluginManager::instance()->findByIdentifier('Rainlab.Translate');

    if ($pluginManager && !$pluginManager->disabled) {

      $locales = \RainLab\Translate\Models\Locale::listEnabled();

      return $locales;

    } elseif( App::getLocale() ) {
            // Backend locale
            return [
                'en' => 'English',
                App::getLocale() => App::getLocale(),
            ];
        }

        // English fallback
        return [
            'en' => 'English',
        ];

    }

    /**
    * Get non English locales from Translate plugin
    * @return array
     */
    public static function getTranslatedTemplates($defaultLocale = 'en', $locale = NULL, $templateType = NULL) {

        $enabledLocales = Settings::getEnabledLocales();

        /**
         * Templates map
         * [locale] => [templateType] => [template]
         */
        $translatedTemplates = [

            'en' => [

                'autoreply' => [
                    'janvince.smallcontactform::mail.autoreply' => 'janvince.smallcontactform::lang.mail.templates.autoreply',
                ],

                'notification' => [
                    'janvince.smallcontactform::mail.notification' => 'janvince.smallcontactform::lang.mail.templates.notification',
                ],

            ],

            'cs' => [

                'autoreply' => [
                    'janvince.smallcontactform::mail.autoreply_cs' => 'janvince.smallcontactform::lang.mail.templates.autoreply_cs',
                ],

                'notification' => [
                    'janvince.smallcontactform::mail.notification_cs' => 'janvince.smallcontactform::lang.mail.templates.notification_cs',
                ],

            ],

            'es' => [

                'autoreply' => [
                    'janvince.smallcontactform::mail.autoreply_es' => 'janvince.smallcontactform::lang.mail.templates.autoreply_es',
                ],

                'notification' => [
                    'janvince.smallcontactform::mail.notification_es' => 'janvince.smallcontactform::lang.mail.templates.notification_es',
                ],

            ],

        ];

        if( $locale and $templateType ) {

            if( !empty($translatedTemplates[$locale]) and !empty($translatedTemplates[$locale][$templateType]) ) {
                return key($translatedTemplates[$locale][$templateType]);
            } elseif ( $defaultLocale and !empty($translatedTemplates[$defaultLocale]) and !empty($translatedTemplates[$defaultLocale][$templateType]) ) {
                return key($translatedTemplates[$defaultLocale][$templateType]);
            } else {
                return NULL;
            }



        } else {

            $allEnabledTemplates = [];

            foreach( $enabledLocales as $enabledLocaleKey => $enabledLocaleName ) {

                if( !empty($translatedTemplates[$enabledLocaleKey]) ) {

                    foreach( $translatedTemplates[$enabledLocaleKey] as $type ) {

                        foreach( $type as $key => $value ) {
                            $allEnabledTemplates[$key] = e(trans($value));

                        }

                    }

                }

            }

            return $allEnabledTemplates;

        }

        return [];

    }

}
