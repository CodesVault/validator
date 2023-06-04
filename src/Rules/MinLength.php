<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Rules\Lib\Calculate;
use Codesvault\Validator\Exceptions\ValidationError;

class MinLength implements Rule
{
	use Calculate;

	protected $validationError;

    /**
     * Check the $value has a minimum size
     *
	 * @param string $dataIdentifier
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\Exceptions\ValidationError
     */
    public function check($dataIdentifier, $value, $attribute = null)
    {
		if (! $this->measure($value, $attribute)) {
			$this->validationError = new ValidationError('min', $dataIdentifier, $value, $attribute);
			$this->setErrorMessage($dataIdentifier, $value, $attribute);
			return $this->validationError;
		}

		return true;
    }

	protected function setErrorMessage($dataIdentifier, $value, $attribute)
	{
		if (is_string($value)) {
			$this->validationError->getErrorMessage("min");
		}

		if (is_numeric($value)) {
			$this->validationError->setErrorMessage("min", "`$dataIdentifier` required minimum $attribute digits");
		}

		if (is_array($value)) {
			$this->validationError->setErrorMessage("min", "`$dataIdentifier` required minimum $attribute items");
		}
	}
}
