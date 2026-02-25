<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;

class Boolean implements Rule
{
    /**
     * Check the value is a boolean type (true, false, 0, 1)
     *
	 * @param string $dataIdentifier
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\Exceptions\ValidationError
     */
    public function check($dataIdentifier, $value, $attribute = null)
    {
        if (! in_array($value, [true, false, 0, 1, '0', '1'], true)) {
			return new ValidationError('bool', $dataIdentifier, $value);
        }

		return true;
    }
}
