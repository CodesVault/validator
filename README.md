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
| required | Check the value is present in the input data and is not empty. |
| email | Check the value is valid email address. |
| url | Check the value is valid url. |
| string | Check the value is string. |
| stringOnly | Check the value is only string charecters. |
| stringWithSpace | Check the value is string with space. |
| stringWithNumber | Check the value is string with number. |
| stringWithDash | Check the value is string with dash and underscore. |
| uppercase | Check the value is string with upper case. |
| lowercase | Check the value is string with lower case. |
| mixedCase | Check the value is string with upper and lower case. |
| stringWithSymbols | Check the value is string with symbols. |
| min | Check the value is greater than or equal to the given value. |
| max | Check the value is less than or equal to the given value. |
| integer | Check the value is integer. |
| sameValue | Check the value is same as the given value. |
| array | Check the value is an array. |
