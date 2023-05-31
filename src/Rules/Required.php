<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\ValidationEngine;
use Codesvault\Validator\ValidationError;

class Required implements Rule
{
    /**
     * Check the value is not empty or null
     *
	 * @param string $dataAttr
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\ValidationError
     */
    public function check($dataAttr, $value)
    {
        if (is_string($value) && mb_strlen(trim($value), 'UTF-8') <= 0) {
			return new ValidationError('required', $dataAttr, $value);
        }
		if (is_array($value) && count($value) <= 0) {
			return new ValidationError('required', $dataAttr, $value);
		}
		if (is_null($value)) {
			return new ValidationError('required', $dataAttr, $value);
		}

		return true;
    }
}
