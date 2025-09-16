<?php

use Codesvault\Validator\Validator;

test('url validation passes', function () {
	$validator = Validator::validate(
		['website' => 'url'],
		['website' => 'https://www.example.com']
	);

	expect($validator->error())->toBeEmpty();
});

test('url validation fails', function () {
	$validator = Validator::validate(
		['website' => 'url'],
		['website' => 'invalid-url']
	);

	expect($validator->error())->toBeArray();
	expect($validator->error())->toHaveKey('website');
});
