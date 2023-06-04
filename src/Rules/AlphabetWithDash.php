<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;

class AlphabetWithDash implements Rule
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
            return new ValidationError('stringWithDash', $dataIdentifier, $value);
        }
		if (preg_match('/^[\pL\pM\pN_-]+$/u', $value) <= 0) {
			return new ValidationError('stringWithDash', $dataIdentifier, $value);
		}

        return true;
    }
}
