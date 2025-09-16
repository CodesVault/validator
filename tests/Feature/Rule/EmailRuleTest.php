<?php

use Codesvault\Validator\Validator;

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
