<?php

namespace Codesvault\Validator;

class ValidationEngine
{
	protected $errorLogHandler;
	protected $inputData;
	protected $data = [];

	public function validate($rulesSet)
	{
		$this->errorLogHandler = new ErrorLogHandler;
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
				$this->errorLogHandler->add($dataAttr, $validate->getErrorMessage());
			}

			$this->setData($dataAttr, $val);
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
