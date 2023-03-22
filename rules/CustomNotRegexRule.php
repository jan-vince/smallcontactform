<?php 

namespace JanVince\SmallContactForm\Rules;

use Log;

class CustomNotRegexRule
{

    /**
     * Apply Validation Rule
     * 
     * @param string $attribute
     * @param mixed $value
     * @param array $params
     * @return bool
     */
    public function validate($attribute, $value, $params): bool
    {
        $param = is_array($params) ? $params[0] : $params;

        // Fallback solution to add ':regex' replacer on OCv1 installations
        if (!class_exists(\System::class)) {
            /** @var \October\Rain\Validation\Validator */
            $validator = func_get_arg(3);
            if (!array_key_exists('custom_not_regex', $validator->replacers)) {
                $self = $this;
                $validator->addReplacer('custom_not_regex', function () use ($self) {
                    return call_user_func_array([$self, 'replace'], func_get_args());
                });
            }
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
    }

    /**
     * Validation Error Message
     * 
     * @return string
     */
    public function message(): string
    {
        return 'The :attribute must not match against ":regex".';
    }

    /**
     * Replace Regex Placeholder
     *
     * @param string $message
     * @param string $attribute
     * @param string $rule
     * @param mixed $parameters
     * @return string
     */
    public function replace($message, $attribute, $rule, $parameters)
    {
        // Laravel 5.5 Fallback solution for OCv1.0
        if ($message === 'validation.custom_not_regex') {
            $message = str_replace(':attribute', $attribute, $this->message());
        }
        return str_replace(':regex', $parameters[0], $message);
    }

}
