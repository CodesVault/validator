<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;

class ArrayOnly implements Rule
{
    /**
     * Check the $value is an array
     *
	 * @param string $dataIdentifier
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\Exceptions\ValidationError
     */
    public function check($dataIdentifier, $value, $attribute = null)
    {
		if (! is_array($value)) {
			return new ValidationError('array', $dataIdentifier, $value);
		}

        return true;
    }
}
