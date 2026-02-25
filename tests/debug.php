<?php

use Codesvault\Validator\Validator;

require __DIR__ . '/../vendor/autoload.php';

$vadidator = Validator::validate(
	[
		'showPagination' => 'bool'
	],
	[
		'showPagination' => 'true'
	]
);
