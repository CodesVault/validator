<?php

use Codesvault\Validator\Validator;

test('basic validator instantiation', function () {
    $validator = Validator::validate(['name' => 'required'], ['name' => 'John']);

    expect($validator)->toBeInstanceOf(\Codesvault\Validator\ValidationEngine::class);
});

test('rules parameter must not be empty', function () {
	Validator::validate([], ['name' => 'John']);
})->throws(\InvalidArgumentException::class);

test('rules parameter type', function () {
	/**
	 * @disregard P1006 // vscode intelephense: Expected exception of type TypeError
	 */
	Validator::validate('', ['name' => 'John']);
})->throws(\TypeError::class);

test('unknown rule validation', function () {
	Validator::validate(['name' => 'unknownRule'], ['name' => 'John']);
})->throws(\Exception::class);

test('multiple rules validation', function () {
    $validator = Validator::validate(
        [
            'username' => 'required|stringOnly',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ],
        [
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => 'password123'
        ]
    );

    expect($validator->error())->toBeEmpty();
    expect($validator->getData())->toHaveKeys(['username', 'email', 'password']);
});
