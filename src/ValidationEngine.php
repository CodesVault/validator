<?php

namespace Codesvault\Validator;

class ValidationEngine
{
	protected $error = false;
	protected $errorList = [];
	protected $inputData;
	protected $data = [];

	public function validate($rulesSet)
	{
		foreach ($rulesSet as $dataAttr => $rules) {
			$this->execute($rules, $dataAttr);
		}
	}

	protected function execute($rules, $dataAttr)
	{
		foreach ($rules as $rule) {
			$val = null;
			if (isset($this->inputData[$dataAttr])) {
				$val = $this->inputData[$dataAttr];
			}
			$validate = (new $rule)->check($dataAttr, $val);

			if ($validate instanceof \Codesvault\Validator\ValidationError) {
				$this->error = ! $this->error ? $validate : $this->error;
				$this->setErrorList($dataAttr, $validate->getErrorMessage());
			}

			$this->setData($dataAttr, $val);
		}
	}

	public function error()
	{
		return $this->error;
	}

	protected function setErrorList($dataAttr, $errorMessage)
	{
		$this->errorList[$dataAttr] = $errorMessage;
	}

	public function getErrorList()
	{
		return $this->errorList;
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
