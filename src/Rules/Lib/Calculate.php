<?php

namespace Codesvault\Validator\Rules\Lib;

trait Calculate
{
	protected $accurate = true;

	public function measure($data, $size)
	{
		$this->stringLength($data, $size);
		$this->numaricLength($data, $size);
		$this->arrayLength($data, $size);

		return $this->accurate;
	}

	public function stringLength($data, $size)
	{
		if (is_string($data) && strlen($data) < $size) {
			$this->accurate = false;
			return false;
		}

		return true;
	}

	public function numaricLength($data, $size)
	{
		if (is_numeric($data) && strlen($data) < $size) {
			$this->accurate = false;
			return false;
		}

		return true;
	}

	public function arrayLength($data, $size)
	{
		if (is_array($data) && count($data) < $size) {
			$this->accurate = false;
			return false;
		}

		return true;
	}
}
