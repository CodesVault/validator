<?php

namespace Codesvault\Validator\Rules\Lib;

class RulesParser
{
	protected $attribute = false;

	public function parse(array $rules)
	{
		$rulesSet = [];
		foreach ($rules as $dataAttr => $ruleset) {
			$rulesSet[$dataAttr] = $this->setValidator($ruleset);
		}

		return $rulesSet;
	}

	public function setValidator($ruleset)
	{
		$rules = [];
		$sets = explode('|', $ruleset);
		foreach ($sets as $rule) {
			$ruleName = $this->attributeHandler($rule);
			$rules[$ruleName] = ['rule_checker' => (new RulesIndex)->getRule($ruleName)];

			if ($this->attribute) {
				$rules[$ruleName]['attribute'] = $this->attribute;
			}
		}

		return $rules;
	}

	protected function attributeHandler($ruleName)
	{
		$rule = explode(':', $ruleName);

		if ('min' === $rule[0] || 'max' === $rule[0]) {
			$this->attribute = $rule[1];
			return $rule[0];
		}

		if ('sameValue' === $rule[0]) {
			$this->attribute = $rule[1];
			return $rule[0];
		}

		return $ruleName;
	}
}
