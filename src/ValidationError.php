<?php

namespace Codesvault\Validator;

class ValidationError
{
	protected $type;
	protected $value;
	protected $attribute;
	protected $errorMessage = [];

	public function __construct($type, $attr, $value)
	{
		$this->type = $type;
		$this->value = $value;
		$this->attribute = $attr;

		$this->errorMessage();
	}

	public function errorMessage()
	{
		$this->errorMessage = [
			'required' => "{$this->attribute} is required",
			'string' => "{$this->attribute} only allows alphabet characters",
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
