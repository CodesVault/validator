<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\ValidationError;

class AlphabetWithSpaces implements Rule
{
    /**
     * Check the $value is valid
     *
	 * @param string $dataIdentifier
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\ValidationError
     */
    public function check($dataIdentifier, $value, $attribute = null)
    {
		if (! is_string($value)) {
			return new ValidationError('stringWithSpace', $dataIdentifier, $value);
		}
        if (is_string($value) && preg_match('/^[\pL\pM\s]+$/u', $value) <= 0) {
			return new ValidationError('stringWithSpace', $dataIdentifier, $value);
        }

		return true;
    }
}
