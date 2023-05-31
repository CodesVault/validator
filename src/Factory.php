<?php

namespace Codesvault\Validator;

class Factory
{
	private static $error = false;

	/**
	 * Create a new Validator instance.
	 *
	 * @param array $rules
	 * @param array $data
	 *
	 * @return bool|\Codesvault\Validator\ValidationError
	 */
	public static function make(array $rules, array $data)
	{
		$rulesSet = (new RulesParser)->parse($rules);
		$validationEngine = new ValidationEngine;
		$validationEngine->validate($rulesSet, $data);
		return $validationEngine;
	}
}
