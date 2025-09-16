<?php

use Codesvault\Validator\Validator;

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
