<?php

use Codesvault\Validator\Validator;

test('user registration validation scenario', function () {
    // Simulate a user registration form with all valid data
    $validator = Validator::validate(
        [
            'username' => 'required|stringOnly',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'full_name' => 'required|stringWithSpace'
        ],
        [
            'username' => 'johndoe',
            'email' => 'john.doe@example.com',
            'password' => 'secretpassword',
            'full_name' => 'John Doe'
        ]
    );

    expect($validator->error())->toBeEmpty();

    $data = $validator->getData();
    expect($data)->toHaveKeys(['username', 'email', 'password', 'full_name']);
    expect($data['username'])->toBe('johndoe');
    expect($data['email'])->toBe('john.doe@example.com');
});

test('user registration with validation errors', function () {
    // Simulate a user registration form with invalid data
    $validator = Validator::validate(
        [
            'username' => 'required|stringOnly',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ],
        [
            'username' => '', // missing required field
            'email' => 'invalid-email', // invalid email
            'password' => '123' // too short
        ]
    );

    $errors = $validator->error();
    expect($errors)->toBeArray();
    expect($errors)->toHaveKey('username');
    expect($errors)->toHaveKey('email');
    expect($errors)->toHaveKey('password');
});

test('partial form validation', function () {
    // Test validation where some fields are optional
    $validator = Validator::validate(
        [
            'username' => 'required|stringOnly',
            'bio' => 'stringWithSpace' // optional field
        ],
        [
            'username' => 'johndoe'
            // bio is not provided, should pass since it's not required
        ]
    );

    expect($validator->error())->toBeEmpty();
    expect($validator->getData())->toHaveKey('username', 'johndoe');
    expect($validator->getData())->toHaveKey('bio', '');
});
