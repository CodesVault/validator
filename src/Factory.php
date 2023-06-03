<?php

namespace Codesvault\Validator;

use Codesvault\Validator\Rules\Lib\RulesParser;

class Factory
{
	/**
	 * Create a new Validator instance.
	 *
	 * @param array $rules
	 * @param array $data
	 *
	 * @return Codesvault\Validator\ValidationEngine
	 */
	public static function make(array $rules, array $data)
	{
		$rulesSet = (new RulesParser)->parse($rules);

		$validationEngine = new ValidationEngine;
		$validationEngine->setInputData($data);
		$validationEngine->validate($rulesSet);

		return $validationEngine;
	}
}
