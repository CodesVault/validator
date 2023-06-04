<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;

class AlphabetWithNumber implements Rule
{
    /**
     * Check the $value is valid
     *
	 * @param string $dataIdentifier
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\Exceptions\ValidationError
     */
    public function check($dataIdentifier, $value, $attribute = null)
    {
        if (! is_string($value)) {
            return new ValidationError('stringWithNumber', $dataIdentifier, $value);
        }
		if (preg_match('/^[\pL\pM\pN]+$/u', $value) <= 0) {
			return new ValidationError('stringWithNumber', $dataIdentifier, $value);
		}

		return true;
    }
}
