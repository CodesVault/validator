<?php

namespace Codesvault\Validator;

use Codesvault\Validator\Exceptions\ErrorLogHandler;

class ValidationEngine
{
	protected $errorLogHandler;
	protected $inputData;
	protected $data = [];

	public function validate($rulesSet)
	{
		$this->errorLogHandler = new ErrorLogHandler;
		foreach ($rulesSet as $dataIdentifier => $rules) {
			$this->execute($rules, $dataIdentifier);
		}
	}

	protected function execute($rules, $dataIdentifier)
	{
		foreach ($rules as $rule) {
			$val = null;
			if (isset($this->inputData[$dataIdentifier])) {
				$val = $this->inputData[$dataIdentifier];
			}
			$attribute = isset($rule['attribute']) ? $rule['attribute'] : null;
			$validate = (new $rule['rule_checker'])->check($dataIdentifier, $val, $attribute);

			if ($validate instanceof \Codesvault\Validator\Exceptions\ValidationError) {
				$this->errorLogHandler->add($dataIdentifier, $validate->getErrorMessage());
			}

			$this->setData($dataIdentifier, $val);
		}
	}

	public function error()
	{
		return $this->errorLogHandler->get();
	}

	public function setInputData($data)
	{
		$this->inputData = empty($data) ? $_REQUEST : $data;
	}

	protected function setData($key, $value)
	{
		$this->data[$key] = $value;
	}

	public function getData()
	{
		return $this->data;
	}
}
