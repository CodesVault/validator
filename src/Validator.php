<?php

namespace Codesvault\Validator;

class Validator
{
    /**
     * Validate $inputs
     *
	 * @param array $rules
     * @param array $data
	 *
     * @return Codesvault\Validator\ValidationEngine
     */
    public static function validate(array $rules, array $data = [])
    {
        $validation = Factory::make($rules, $data);
        return $validation;
    }
}
