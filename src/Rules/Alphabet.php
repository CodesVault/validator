<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Exceptions\ValidationError;

class Alphabet implements Rule
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
		if (! is_string($value) || empty($value)) {
			return new ValidationError('string', $dataIdentifier, $value);
		}

		return true;
    }
}
