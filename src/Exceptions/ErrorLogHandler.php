<?php

namespace Codesvault\Validator\Exceptions;

class ErrorLogHandler
{
	protected $queue;

	public function __construct()
	{
		$this->queue = [];
	}

	public function add($attr, $message)
	{
		$this->queue[$attr][] = $message;
	}

	public function get()
	{
		return $this->queue ?? false;
	}
}
