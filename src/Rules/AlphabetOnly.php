<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\ValidationError;

class AlphabetOnly implements Rule
{
    /**
     * Check the $value is valid string
     *
	 * @param string $dataAttr
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\ValidationError
     */
    public function check($dataAttr, $value)
    {
        $val = is_string($value) && preg_match('/^[\pL\pM]+$/u', $value);
		if (! $val) {
			return new ValidationError('stringOnly', $dataAttr, $value);
		}

		return true;
    }
}
