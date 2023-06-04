<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;

class Email implements Rule
{
    /**
     * Check the $value is valid email
     *
	 * @param string $dataIdentifier
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\Exceptions\ValidationError
     */
    public function check($dataIdentifier, $value, $attribute = null)
    {
		$email = filter_var($value, FILTER_VALIDATE_EMAIL);
		if (! $email) {
			return new ValidationError('email', $dataIdentifier, $value);
		}

        return true;
    }
}
