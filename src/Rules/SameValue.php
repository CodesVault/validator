<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;

class SameValue implements Rule
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
		if ($value != $attribute) {
			return new ValidationError('sameValue', $dataIdentifier, $value, $attribute);
		}

		return true;
    }
}
