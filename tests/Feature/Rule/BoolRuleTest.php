<?php

use Codesvault\Validator\Validator;

test('bool validation passes with true', function () {
    $validator = Validator::validate(
        ['is_active' => 'bool'],
        ['is_active' => true]
    );

    expect($validator->error())->toBeEmpty();
});

test('bool validation passes with false', function () {
    $validator = Validator::validate(
        ['is_active' => 'bool'],
        ['is_active' => false]
    );

    expect($validator->error())->toBeEmpty();
});

test('bool validation passes with 1', function () {
    $validator = Validator::validate(
        ['is_active' => 'bool'],
        ['is_active' => 1]
    );

    expect($validator->error())->toBeEmpty();
});

test('bool validation passes with 0', function () {
    $validator = Validator::validate(
        ['is_active' => 'bool'],
        ['is_active' => 0]
    );

    expect($validator->error())->toBeEmpty();
});

test('bool validation passes with string 1', function () {
    $validator = Validator::validate(
        ['is_active' => 'bool'],
        ['is_active' => '1']
    );

    expect($validator->error())->toBeEmpty();
});

test('bool validation passes with string 0', function () {
    $validator = Validator::validate(
        ['is_active' => 'bool'],
        ['is_active' => '0']
    );

    expect($validator->error())->toBeEmpty();
});

test('bool validation fails with string', function () {
    $validator = Validator::validate(
        ['is_active' => 'bool'],
        ['is_active' => 'yes']
    );

    expect($validator->error())->toBeArray();
    expect($validator->error())->toHaveKey('is_active');
});

test('bool validation fails with integer other than 0 or 1', function () {
    $validator = Validator::validate(
        ['is_active' => 'bool'],
        ['is_active' => 5]
    );

    expect($validator->error())->toBeArray();
    expect($validator->error())->toHaveKey('is_active');
});
