<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\ValidationError;

class AlphabetWithNumber implements Rule
{
    /**
     * Check the $value is valid
     *
	 * @param string $dataAttr
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\ValidationError
     */
    public function check($dataAttr, $value)
    {
        if (! is_string($value)) {
            return new ValidationError('stringWithNumber', $dataAttr, $value);
        }
		if (preg_match('/^[\pL\pM\pN]+$/u', $value) <= 0) {
			return new ValidationError('stringWithNumber', $dataAttr, $value);
		}

		return true;
    }
}
