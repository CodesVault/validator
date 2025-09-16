<?php

use Codesvault\Validator\Validator;

test('basic validator instantiation', function () {
    $validator = Validator::validate(['name' => 'required'], ['name' => 'John']);

    expect($validator)->toBeInstanceOf(\Codesvault\Validator\ValidationEngine::class);
});

test('required field validation passes', function () {
    $validator = Validator::validate(
        ['name' => 'required'],
        ['name' => 'John']
    );

    expect($validator->error())->toBeEmpty();
    expect($validator->getData())->toHaveKey('name', 'John');
});

test('required field validation fails', function () {
    $validator = Validator::validate(
        ['name' => 'required'],
        ['name' => '']
    );

    expect($validator->error())->toBeArray();
    expect($validator->error())->toHaveKey('name');
});

test('email validation passes', function () {
    $validator = Validator::validate(
        ['email' => 'email'],
        ['email' => 'test@example.com']
    );

    expect($validator->error())->toBeEmpty();
});

test('email validation fails', function () {
    $validator = Validator::validate(
        ['email' => 'email'],
        ['email' => 'invalid-email']
    );

    expect($validator->error())->toBeArray();
    expect($validator->error())->toHaveKey('email');
});

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
