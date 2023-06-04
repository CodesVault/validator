<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;

class AlphabetOnly implements Rule
{
    /**
     * Check the $value is valid string
     *
	 * @param string $dataIdentifier
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\Exceptions\ValidationError
     */
    public function check($dataIdentifier, $value, $attribute = null)
    {
        $val = is_string($value) && preg_match('/^[\pL\pM]+$/u', $value);
		if (! $val) {
			return new ValidationError('stringOnly', $dataIdentifier, $value);
		}

		return true;
    }
}
