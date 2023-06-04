# Validator

Data validation composer package.

## Installation

Install using composer.

```
composer require codesvault/validator
```

<br>
<br>

## Usage

```php
$validator = Validator::validate(
    [
        'username'	=> 'required|stringOnly',
        'full_name'	=> 'stringWithSpace',
		'password'	=> 'required|min:8',
		'email'		=> 'required|email',
    ],
);
```

<br>

It'll get data from `$_REQUEST` by default. But you also can pass data as second parameter.

```php
$validator = Validator::validate(
    [
        'username'	=> 'required|stringOnly',
        'full_name'	=> 'stringWithSpace'
    ],
	[
		'username'	=> 'abmsourav',
		'full_name'	=> 'Keramot UL Islam'
	]
);
```

<br>
<br>

## Handling Errors

If any data is invalid then `error` method will return error messages array. Otherwise it'll return false.
<br>
`getData` method will return validated data array.

```php
$error = $validator->error();
if ($error) {
	return $error;
}
$validator->getData();
```

<br>
<br>

## Available Rules

| Rule | Description |
| --- | --- |
| required | Check if the field under validation is present in the input data and is not empty. |
| email | Check if the field under validation is valid email address. |
| url | Check if the field under validation is valid url. |
| string | Check if the field under validation is string. |
| stringOnly | Check if the field under validation is only string charecters. |
| stringWithSpace | Check if the field under validation is string with space. |
| stringWithNumber | Check if the field under validation is string with number. |
| StringWithDash | Check if the field under validation is string with dash and underscore. |
| min | Check if the field under validation is greater than or equal to the given value. |
| max | Check if the field under validation is less than or equal to the given value. |
| integer | Check if the field under validation is integer. |
| sameValue | Check if the field under validation is same as the given value. |
