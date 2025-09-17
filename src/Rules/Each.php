<?php

namespace Codesvault\Validator\Rules;

use Codesvault\Validator\Rules\Lib\Rule;
use Codesvault\Validator\Exceptions\ValidationError;
use Codesvault\Validator\Factory;
use Codesvault\Validator\Rules\Lib\Calculate;
use Codesvault\Validator\Rules\Lib\RulesIndex;
use Codesvault\Validator\Rules\Lib\RulesParser;
use PhpParser\Node\Expr\Throw_;

class Each implements Rule
{
	use Calculate;

	private $operator;

    /**
     * Check the value is not empty or null
     *
	 * @param string $dataIdentifier
     * @param mixed $value
	 *
     * @return bool|\Codesvault\Validator\Exceptions\ValidationError
     */
    public function check($dataIdentifier, $value, $attribute = null)
    {
		if (empty($value)) {
			return new \Exception('The `' . $dataIdentifier . '` field must be a non-empty array.');
		}
		if (! is_array($value)) {
			return new ValidationError('array', $dataIdentifier, $value);
		}
		if (! $attribute) {
			return new ValidationError('attr', $dataIdentifier, $value);
		}

		$attributeList = $this->findOperatorAndGetRules($attribute);
		$validated = true;

		foreach ($attributeList as $attr) {
			$ruleName = array_key_first($attr);

			if (! isset($attr[$ruleName]['rule_checker'])) {
				throw new \Exception('The `' . $dataIdentifier . '` rule undefined attributes.');
			}

			$ruleChecker = $attr[$ruleName]['rule_checker'];
			$ruleAttribute = $attr[$ruleName]['attribute'] ?? null;

			foreach ($value as $item) {
				$validated = (new $ruleChecker)->check($dataIdentifier, $item, $ruleAttribute);

				// if any one rule is valid in `or` operator then break the loop
				if (true === $validated && 'or' === $this->operator) {
					break;
				}
			}

			// if any one rule is invalid in `and` operator then break the loop
			if ($validated instanceof ValidationError && 'and' === $this->operator) {
				break;
			}
		}

		return $validated;
	}

	private function findOperatorAndGetRules($attr)
	{
		$rules = [];

		$or = explode(',', $attr);
		if (count($or) > 1) {
			$rules = $or;
			$this->operator = 'or';
		}

		$and = explode('&', $attr);
		if (count($and) > 1) {
			$rules = $and;
			$this->operator = 'and';
		}

		if (count($or) > 1 && count($and) > 1) {
			throw new \Exception('You can not use both `,` and `&` operators in a each rule');
		}

		$rules = !empty($rules) ? $rules : $or;
		return (new RulesParser)->parse($rules);
	}
}
