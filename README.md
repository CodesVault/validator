# validator

Data validation composer package.

## Installation

<br>
<br>

## Usage

```php
$validator = Validator::validate(
    [
        'username'	=> 'required|stringOnly',
        'full_name'	=> 'stringWithSpace',
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

`validate` method will return an object of `ValidationEngine` class.

```php
if ($validator->error()) {
	return $validator->getErrorList();
}

return $validator->getData();
```
