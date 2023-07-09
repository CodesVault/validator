<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;

class Uppercase implements Rule
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
		if (empty($value)) return true;
		if (! is_string($value)) {
			return new ValidationError('uppercase', $dataIdentifier, $value);
		}
		if (mb_strtoupper($value, mb_detect_encoding($value)) !== $value) {
			return new ValidationError('uppercase', $dataIdentifier, $value);
		}

		return true;
    }
}
