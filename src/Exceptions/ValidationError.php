<?php

namespace Codesvault\Validator\Exceptions;

class ValidationError
{
	protected $type;
	protected $value;
	protected $dataIdentifier;
	protected $attribute;
	protected $errorMessage = [];

	public function __construct($type, $dataIdentifier, $value, $attribute = null)
	{
		$this->type = $type;
		$this->value = $value;
		$this->dataIdentifier = $dataIdentifier;
		$this->attribute = $attribute;

		$this->errorMessage();
	}

	public function errorMessage()
	{
		$this->errorMessage = [
			'required'				=> "`{$this->dataIdentifier}` is required",
			'string'				=> "`{$this->dataIdentifier}` only allows string type",
			'stringOnly'			=> "`{$this->dataIdentifier}` only allows alphabet characters",
			'stringWithDash'		=> "`{$this->dataIdentifier}` only allows a-z with 0-9, _ and -",
			'stringWithNumber'		=> "`{$this->dataIdentifier}` only allows alphabet and numebers",
			'stringWithSpace'		=> "`{$this->dataIdentifier}` only allows alphabet and spaces",
			'uppercase'				=> "`{$this->dataIdentifier}` only allows uppercase alphabet characters",
			'lowercase'				=> "`{$this->dataIdentifier}` only allows lowercase alphabet characters",
			'mixedCase'				=> "`{$this->dataIdentifier}` only allows upper & lower case alphabet characters",
			'stringWithSymbols'		=> "`{$this->dataIdentifier}` only allows alphabet characters with symbols",

			'min'					=> "`{$this->dataIdentifier}` required minimum {$this->attribute} characters",
			'max'					=> "`{$this->dataIdentifier}` required maximum {$this->attribute} characters",

			'email'					=> "`{$this->dataIdentifier}` only allows valid email address",
			'integer'				=> "`{$this->dataIdentifier}` only allows integer type",
			'url'					=> "`{$this->dataIdentifier}` only allows valid URL",
			'sameValue'				=> "`{$this->dataIdentifier}` only allows same value as {$this->attribute}",

			'array'				=> "`{$this->dataIdentifier}` only allows array",
		];
	}

	public function setErrorMessage($type, $message)
	{
		$this->errorMessage[$type] = $message;
	}

	public function getErrorMessage()
	{
		if (! empty($this->errorMessage[$this->type])) {
			return $this->errorMessage[$this->type];
		}
		return false;
	}
}
