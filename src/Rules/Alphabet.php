<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\ValidationError;

class Alphabet implements Rule
{
    /**
     * Check the $value is valid string
     *
	 * @param string $dataIdentifier
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\ValidationError
     */
    public function check($dataIdentifier, $value, $attribute = null)
    {
        $val = is_string($value);
		if (! $val) {
			return new ValidationError('string', $dataIdentifier, $value);
		}

		return true;
    }
}
