<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;

class StringWithSymbol implements Rule
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
			return new ValidationError('stringWithSymbols', $dataIdentifier, $value);
		}
		if (! preg_match('/\p{Z}|\p{S}|\p{P}/u', $value)) {
			return new ValidationError('stringWithSymbols', $dataIdentifier, $value);
		}

		return true;
    }
}
