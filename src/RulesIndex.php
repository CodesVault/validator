<?php

namespace Codesvault\Validator;

use Codesvault\Validator\Rules\Alphabet;
use Codesvault\Validator\Rules\AlphabetOnly;
use Codesvault\Validator\Rules\AlphabetWithDash;
use Codesvault\Validator\Rules\AlphabetWithNumber;
use Codesvault\Validator\Rules\AlphabetWithSpaces;
use Codesvault\Validator\Rules\Required;

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
            // 'email'                     => new Rules\Email,
            // 'numeric'                   => new Rules\Numeric,
            // 'alpha_num'                 => new Rules\AlphaNum,
            // 'alpha_dash'                => new Rules\AlphaDash,
            // 'alpha_spaces'              => new Rules\AlphaSpaces,
            // 'in'                        => new Rules\In,
            // 'not_in'                    => new Rules\NotIn,
            // 'min'                       => new Rules\Min,
            // 'max'                       => new Rules\Max,
            // 'between'                   => new Rules\Between,
            // 'url'                       => new Rules\Url,
            // 'integer'                   => new Rules\Integer,
            // 'boolean'                   => new Rules\Boolean,
            // 'ip'                        => new Rules\Ip,
            // 'ipv4'                      => new Rules\Ipv4,
            // 'ipv6'                      => new Rules\Ipv6,
            // 'extension'                 => new Rules\Extension,
            // 'array'                     => new Rules\TypeArray,
            // 'same'                      => new Rules\Same,
            // 'regex'                     => new Rules\Regex,
            // 'date'                      => new Rules\Date,
            // 'uploaded_file'             => new Rules\UploadedFile,
            // 'mimes'                     => new Rules\Mimes,
            // 'callback'                  => new Rules\Callback,
            // 'json'                      => new Rules\Json,
            // 'digits'                    => new Rules\Digits,
            // 'defaults'                  => new Rules\Defaults,
            // 'default'                   => new Rules\Defaults,
        ];
	}
}
