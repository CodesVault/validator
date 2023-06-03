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

			'email'					=> "`{$this->dataIdentifier}` only allows valid email address",

			'min'					=> "`{$this->dataIdentifier}` required minimum {$this->attribute} characters",
			'max'					=> "`{$this->dataIdentifier}` required maximum {$this->attribute} characters",
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
