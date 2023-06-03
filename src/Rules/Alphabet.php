<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\ValidationError;

class Alphabet implements Rule
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
        $val = is_string($value);
		if (! $val) {
			return new ValidationError('string', $dataAttr, $value);
		}

		return true;
    }
}
