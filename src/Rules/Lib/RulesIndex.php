<?php

namespace Codesvault\Validator\Rules\Lib;

use Codesvault\Validator\Rules\Alphabet;
use Codesvault\Validator\Rules\AlphabetOnly;
use Codesvault\Validator\Rules\AlphabetWithDash;
use Codesvault\Validator\Rules\AlphabetWithNumber;
use Codesvault\Validator\Rules\AlphabetWithSpaces;
use Codesvault\Validator\Rules\Email;
use Codesvault\Validator\Rules\Integer;
use Codesvault\Validator\Rules\MaxLength;
use Codesvault\Validator\Rules\MinLength;
use Codesvault\Validator\Rules\Mixedcase;
use Codesvault\Validator\Rules\Required;
use Codesvault\Validator\Rules\SameValue;
use Codesvault\Validator\Rules\Lowercase;
use Codesvault\Validator\Rules\StringWithSymbol;
use Codesvault\Validator\Rules\Uppercase;
use Codesvault\Validator\Rules\Url;
use Codesvault\Validator\Rules\ArrayOnly;

class RulesIndex
{
	protected $rules = [];

	public function __construct()
	{
		$this->index();
	}

	public function getRule(string $rule)
	{
		if (! array_key_exists($rule, $this->rules)) {
			throw new \Exception("`{$rule}` is not a valid rule");
		}

		return $this->rules[$rule];
	}

	public function index()
	{
		$this->rules = [
            'required'			=> Required::class,
            'string'			=> Alphabet::class,
			'stringOnly'		=> AlphabetOnly::class,
            'stringWithDash'	=> AlphabetWithDash::class,
            'stringWithNumber'	=> AlphabetWithNumber::class,
            'stringWithSpace'	=> AlphabetWithSpaces::class,
			'uppercase'			=> Uppercase::class,
			'lowercase'			=> Lowercase::class,
			'mixedCase'			=> Mixedcase::class,
			'stringWithSymbols'	=> StringWithSymbol::class,

			'min'				=> MinLength::class,
			'max'				=> MaxLength::class,

            'email'				=> Email::class,
			'integer'			=> Integer::class,
			'url'				=> Url::class,
			'sameValue'			=> SameValue::class,

			'array'				=> ArrayOnly::class,
        ];
	}
}
