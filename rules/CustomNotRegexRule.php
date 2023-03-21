<?php 

namespace JanVince\SmallContactForm\Rules;

use Log;

class CustomNotRegexRule
{

    /**
     * Validate Rule
     * 
     * @param string $attribute
     * @param mixed $value
     * @param array $params
     * @return bool
     */
    public function validate($attribute, $value, $params): bool
    {
        $param = is_array($params) ? $params[0] : $params;

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
     * Custom Validation Error Message
     * 
     * @return string
     */
    public function message(): string
    {
        return 'The :attribute must not match against ":regex".';
    }

    /**
     * Replace Regex
     *
     * @param string $message
     * @param string $attribute
     * @param string $rule
     * @param mixed $parameters
     * @return string
     */
    public function replace($message, $attribute, $rule, $parameters)
    {
        return str_replace(':regex', $parameters[0], $message);
    }

}