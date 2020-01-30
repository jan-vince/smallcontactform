<?php

namespace JanVince\SmallContactForm;

use \Illuminate\Support\Facades\Event;
use System\Classes\PluginBase;
use System\Classes\PluginManager;
use Config;
use Backend;
use Validator;
use Log;


use JanVince\SmallContactForm\Models\Settings;


class Plugin extends PluginBase {

    /**
     * @var array Plugin dependencies
     */
    public $require = [];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails() {
        return [
            'name' => 'janvince.smallcontactform::lang.plugin.name',
            'description' => 'janvince.smallcontactform::lang.plugin.description',
            'author' => 'Jan Vince',
            'icon' => 'icon-inbox'
        ];
    }

    public function boot() {

        /**
         * Custom Validator rules
         */
        Validator::extend('custom_not_regex', function ($attribute, $value, $parameters) {

            if (is_array($parameters)) {
                $param = $parameters[0];
            } else {
                $param = $parameters;
            }

            try {
                $result = preg_match($param, $value);

                if ($result === 1) {
                    return false;
                } else {
                    return true;
                }
            } catch (\Exception $e) {
                Log::error('Error in Small Contact Form custom_not_regex validation rule! ' . $e->getMessage());
            }

            return false;
        });

    }

    public function registerSettings() {

        return [
            'settings' => [
                'label' => 'janvince.smallcontactform::lang.plugin.name',
                'description' => 'janvince.smallcontactform::lang.plugin.description',
                'category'    => 'Small plugins',
                'icon' => 'icon-inbox',
                'class' => 'JanVince\SmallContactForm\Models\Settings',
                'keywords' => 'small contact form message recaptcha antispam',
                'order' => 990,
                'permissions' => ['janvince.smallcontactform.access_settings'],
            ]
        ];
    }

    public function registerNavigation(){
        return [
            'smallcontactform' => [
                'label'       => 'janvince.smallcontactform::lang.navigation.main_label',
                'url'         => Backend::url('janvince/smallcontactform/messages'),
                'icon'        => 'icon-inbox',
                'permissions' => ['janvince.smallcontactform.access_messages'],
                'order'       => 990,

                'sideMenu' => [
                    'messages' => [
                        'label'       => 'janvince.smallcontactform::lang.navigation.messages',
                        'icon'        => 'icon-envelope-o',
                        'url'         => Backend::url('janvince/smallcontactform/messages'),
                        'permissions' => ['janvince.smallcontactform.access_messages']
                    ],

                ],

            ],

        ];

    }

    public function registerPermissions(){

        return [
            'janvince.smallcontactform.access_messages' => [
                'label' => 'janvince.smallcontactform::lang.permissions.access_messages',
                'tab' => 'janvince.smallcontactform::lang.plugin.name',
            ],
            'janvince.smallcontactform.access_settings' => [
                'label' => 'janvince.smallcontactform::lang.permissions.access_settings',
                'tab' => 'janvince.smallcontactform::lang.plugin.name',
            ],
            'janvince.smallcontactform.delete_messages' => [
                'label' => 'janvince.smallcontactform::lang.permissions.delete_messages',
                'tab' => 'janvince.smallcontactform::lang.plugin.name',
            ],
            'janvince.smallcontactform.export_messages' => [
                'label' => 'janvince.smallcontactform::lang.permissions.export_messages',
                'tab' => 'janvince.smallcontactform::lang.plugin.name',
            ],
        ];

    }

    public function registerComponents()
    {
        return [
            'JanVince\SmallContactForm\Components\SmallContactForm' => 'contactForm',
        ];
    }

    public function registerPageSnippets()
    {
        return [
            'JanVince\SmallContactForm\Components\SmallContactForm' => 'contactForm',
        ];
    }
    
    public function registerMailTemplates()
    {

        return Settings::getTranslatedTemplates();

    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
            ],
            'functions' => [
                'trans' => function($value) { return e(trans($value)); },
                'html_entity_decode' => function($value) { return html_entity_decode($value); },
                'settingsGet' => function($value, $default = NULL) { return Settings::get($value, $default); }
            ]
        ];
    }

    /**
    *	Custom list types
    */
    public function registerListColumnTypes()
    {


        return [
            'strong' => function($value) { return '<strong>'. $value . '</strong>'; },
            'text_preview' => function($value) { $content = mb_substr(strip_tags($value), 0, 150); if(mb_strlen($content) > 150) { return ($content . '...'); } else { return $content; } },
            'array_preview' => function($value) { $content = mb_substr(strip_tags( implode(' --- ', $value) ), 0, 150); if(mb_strlen($content) > 150) { return ($content . '...'); } else { return $content; } },
            'switch_icon_star' => function($value) { return '<div class="text-center"><span class="'. ($value==1 ? 'oc-icon-circle text-success' : 'text-muted oc-icon-circle text-draft') .'">' . ($value==1 ? e(trans('janvince.smallcontactform::lang.models.message.columns.new')) : e(trans('janvince.smallcontactform::lang.models.message.columns.read')) ) . '</span></div>'; },
            'switch_extended_input' => function($value) { if($value){return '<span class="list-badge badge-success"><span class="icon-check"></span></span>';} else { return '<span class="list-badge badge-danger"><span class="icon-minus"></span></span>';} },
            'switch_extended' => function($value) { if($value){return '<span class="list-badge badge-success"><span class="icon-check"></span></span>';} else { return '<span class="list-badge badge-danger"><span class="icon-minus"></span></span>';} },
            'attached_images_count' => function($value){ return (count($value) ? count($value) : NULL); },
            'image_preview' => function($value) {
                $width = Settings::get('records_list_preview_width') ? Settings::get('records_list_preview_width') : 50;
                $height = Settings::get('records_list_preview_height') ? Settings::get('records_list_preview_height') : 50;

                if($value){ return "<img src='".$value->getThumb($width, $height)."' style='width: auto; height: auto; max-width: ".$width."px; max-height: ".$height."px'>"; }
            },
        ];
    }

    public function registerReportWidgets()
    {
        return [
            'JanVince\SmallContactForm\ReportWidgets\Messages' => [
                'label'   => 'janvince.smallcontactform::lang.reportwidget.partials.messages.label',
                'context' => 'dashboard'
            ],
            'JanVince\SmallContactForm\ReportWidgets\NewMessage' => [
                'label'   => 'janvince.smallcontactform::lang.reportwidget.partials.new_message.label',
                'context' => 'dashboard'
            ],
        ];
    }

}
