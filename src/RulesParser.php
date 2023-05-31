<?php

namespace Codesvault\Validator;

class RulesParser
{
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
			$rules[$rule] = (new RulesIndex)->getRule($rule);
		}

		return $rules;
	}
}
