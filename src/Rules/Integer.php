<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;

class Integer implements Rule
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
        if (! filter_var($value, FILTER_VALIDATE_INT)) {
			return new ValidationError('integer', $dataIdentifier, $value);
        }

		return true;
    }
}
