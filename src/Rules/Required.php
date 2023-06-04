<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;

class Required implements Rule
{
    /**
     * Check the value is not empty or null
     *
	 * @param string $dataIdentifier
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\Exceptions\ValidationError
     */
    public function check($dataIdentifier, $value, $attribute = null)
    {
        if (is_string($value) && mb_strlen(trim($value), 'UTF-8') <= 0) {
			return new ValidationError('required', $dataIdentifier, $value);
        }
		if (is_array($value) && count($value) <= 0) {
			return new ValidationError('required', $dataIdentifier, $value);
		}
		if (is_null($value)) {
			return new ValidationError('required', $dataIdentifier, $value);
		}

		return true;
    }
}
