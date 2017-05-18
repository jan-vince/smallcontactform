<?php

namespace JanVince\SmallContactForm\Models;

use Model;

class Settings extends Model
{

    public $requiredPerrmisions = ['janvince.smallcontactform.access_settings'];

	public $implement = ['System.Behaviors.SettingsModel'];

    public $settingsCode = 'janvince_smallcontactform_settings';

    public $settingsFields = 'fields.yaml';

	public $translatable = [];

	/**
	 * Generate form fields types list
	 *	@return array
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
	 *	@return array
	 */
	public function getValidationTypeOptions($value, $formData)
	{

	    return [
			'required' => 'janvince.smallcontactform::lang.settings.form_field_validation.required',
			'email' => 'janvince.smallcontactform::lang.settings.form_field_validation.email',
			'numeric' => 'janvince.smallcontactform::lang.settings.form_field_validation.numeric',
		];
	}

	/**
	 * Generate list of existing fields for email name
	 *	@return array
	 */
	public function getAutoreplyNameFieldOptions($value, $formData)
	{

		return $this->getFieldsList('text');

	}

	/**
	 * Generate list of existing fields for email name
	 *	@return array
	 */
	public function getAutoreplyEmailFieldOptions($value, $formData)
	{

		return $this->getFieldsList('email');

	}

	/**
	 * Generate list of existing message fields
	 *	@return array
	 */
	public function getAutoreplyMessageFieldOptions($value, $formData)
	{

		return $this->getFieldsList('textarea');

	}

	/**
	 * Generate fields list
	 * @return arry
	 */
	private function getFieldsList($type = false){

		$output = [];

		foreach (Settings::get('form_fields', []) as $field) {

			if($type && !empty($field['type']) && $field['type'] <> $type) {
				continue;
			}

			$output[$field['name']] = $field['name'];

		}

		return $output;

	}

	/**
	 * Custom validation for repeater fields
	 */
	public function beforeValidate()
	{

		// $validator = Validator::make();

	    foreach ($this->form_fields as $field) {

	        // if (array_get($product, 'quantity', 0) < 0) {
	        //     throw new ValidationException(['products' => 'All quantities should be greater than 0']);
	        // }

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
				'attributes' => [
					'type' => 'text',
				],
				'html_close' => NULL,
			],

			'email' => [
				'html_open' => 'input',
				'attributes' => [
					'type' => 'email',
				],
				'html_close' => NULL,
			],

			'textarea' => [
				'html_open' => 'textarea',
				'attributes' => [
					'rows' => 5,
				],
				'html_close' => 'textarea',
			],

		];

		if($type){
			if(!empty($types[$type])){
				return $types[$type];
			}
		}

		return $types;

	}


}
