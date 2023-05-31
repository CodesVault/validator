<?php

namespace Codesvault\Validator;

class ValidationEngine
{
	protected $error;

	public function validate($rulesSet, $data)
	{
		foreach ($rulesSet as $dataAttr => $rules) {
			if ($this->error) {
				break;
			}

			foreach ($rules as $rule) {
				$val = null;
				if (isset($data[$dataAttr])) {
					$val = $data[$dataAttr];
				}
				$validate = (new $rule)->check($dataAttr, $val);

				if ($validate instanceof \Codesvault\Validator\ValidationError) {
					$this->error = $validate;
					break;
				}
			}
		}
	}

	public function error()
	{
		return $this->error;
	}
}
