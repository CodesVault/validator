<?php

namespace Codesvault\Validator;

class ValidationEngine
{
	protected $error;
	protected $inputData;
	protected $data = [];

	public function validate($rulesSet)
	{
		foreach ($rulesSet as $dataAttr => $rules) {
			if ($this->error) {
				break;
			}

			foreach ($rules as $rule) {
				$val = null;
				if (isset($this->inputData[$dataAttr])) {
					$val = $this->inputData[$dataAttr];
				}
				$validate = (new $rule)->check($dataAttr, $val);

				if ($validate instanceof \Codesvault\Validator\ValidationError) {
					$this->error = $validate;
					break;
				}

				$this->setData($dataAttr, $val);
			}
		}
	}

	public function error()
	{
		return $this->error;
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
