<?php

use Codesvault\Validator\Validator;

test('same value rule passes', function () {
	$validator = Validator::validate(
		['name' => 'sameValue:John'],
		['name' => 'John']
	);

	expect($validator->error())->toBeEmpty();
});

test('same value rule fails', function () {
	$validator = Validator::validate(
		['name' => 'sameValue:John'],
		['name' => 'Doe']
	);

	expect($validator->error())->toBeArray();
	expect($validator->error())->toHaveKey('name');
});
