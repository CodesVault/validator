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

$data = $validator->getData();

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
| each | validate each item of an array. |

<br>
<br>

## Examples

### Basic Validation Rules

#### Required Rule
Ensures the field is present and not empty.

```php
$validator = Validator::validate(
    ['username' => 'required'],
    ['username' => 'john_doe']  // ✅ Valid
);

// Invalid examples:
// ['username' => '']         // ❌ Empty string
// ['username' => null]       // ❌ Null value
// []                         // ❌ Missing field
```

#### Email Rule
Validates email address format.

```php
$validator = Validator::validate(
    ['email' => 'email'],
    ['email' => 'user@example.com']  // ✅ Valid
);

// Invalid examples:
// ['email' => 'invalid-email']     // ❌ Invalid format
// ['email' => '@example.com']      // ❌ Missing username
// ['email' => 'user@']             // ❌ Missing domain
```

#### URL Rule
Validates URL format.

```php
$validator = Validator::validate(
    ['website' => 'url'],
    ['website' => 'https://example.com']  // ✅ Valid
);

// Also valid:
// ['website' => 'http://example.com']
// ['website' => 'ftp://files.example.com']

// Invalid examples:
// ['website' => 'not-a-url']       // ❌ Invalid format
// ['website' => 'example.com']     // ❌ Missing protocol
```

### String Validation Rules

#### String Only (stringOnly)
Validates that the value contains only alphabetic characters.

```php
$validator = Validator::validate(
    ['name' => 'stringOnly'],
    ['name' => 'John']  // ✅ Valid
);

// Invalid examples:
// ['name' => 'John123']            // ❌ Contains numbers
// ['name' => 'John Doe']           // ❌ Contains space
// ['name' => 'John-Doe']           // ❌ Contains dash
```

#### String with Spaces (stringWithSpace)
Validates strings that can contain alphabetic characters and spaces.

```php
$validator = Validator::validate(
    ['full_name' => 'stringWithSpace'],
    ['full_name' => 'John Doe']  // ✅ Valid
);

// Also valid:
// ['full_name' => 'Mary Jane Watson']

// Invalid examples:
// ['full_name' => 'John123']       // ❌ Contains numbers
// ['full_name' => 'John-Doe']      // ❌ Contains dash
```

#### String with Numbers (stringWithNumber)
Validates strings that can contain alphabetic characters and numbers.

```php
$validator = Validator::validate(
    ['username' => 'stringWithNumber'],
    ['username' => 'user123']  // ✅ Valid
);

// Also valid:
// ['username' => 'JohnDoe456']

// Invalid examples:
// ['username' => 'user 123']       // ❌ Contains space
// ['username' => 'user-123']       // ❌ Contains dash
```

#### String with Dash (stringWithDash)
Validates strings that can contain alphabetic characters, dashes, and underscores.

```php
$validator = Validator::validate(
    ['slug' => 'stringWithDash'],
    ['slug' => 'hello-world_page']  // ✅ Valid
);

// Also valid:
// ['slug' => 'my_awesome_post']
// ['slug' => 'hello-world']

// Invalid examples:
// ['slug' => 'hello world']        // ❌ Contains space
// ['slug' => 'hello123']           // ❌ Contains numbers
```

#### Case Validation Rules

```php
// Uppercase only
$validator = Validator::validate(
    ['code' => 'uppercase'],
    ['code' => 'HELLO']  // ✅ Valid
);

// Lowercase only
$validator = Validator::validate(
    ['tag' => 'lowercase'],
    ['tag' => 'hello']  // ✅ Valid
);

// Mixed case (both upper and lower case required)
$validator = Validator::validate(
    ['password' => 'mixedCase'],
    ['password' => 'HelloWorld']  // ✅ Valid
);
```

#### String with Symbols (stringWithSymbols)
Validates strings that can contain symbols and special characters.

```php
$validator = Validator::validate(
    ['password' => 'stringWithSymbols'],
    ['password' => 'Pass@123!']  // ✅ Valid
);

// Also valid:
// ['password' => 'My$ecur3#Pass']
```

### Length Validation Rules

#### Minimum Length (min)
Validates minimum length/size requirements.

```php
// String minimum length
$validator = Validator::validate(
    ['password' => 'min:8'],
    ['password' => 'mypassword']  // ✅ Valid (10 characters)
);

// Number minimum value
$validator = Validator::validate(
    ['age' => 'min:18'],
    ['age' => 25]  // ✅ Valid
);

// Array minimum items
$validator = Validator::validate(
    ['tags' => 'min:2'],
    ['tags' => ['php', 'javascript', 'html']]  // ✅ Valid (3 items)
);
```

#### Maximum Length (max)
Validates maximum length/size requirements.

```php
// String maximum length
$validator = Validator::validate(
    ['title' => 'max:100'],
    ['title' => 'Short Title']  // ✅ Valid
);

// Number maximum value
$validator = Validator::validate(
    ['score' => 'max:100'],
    ['score' => 85]  // ✅ Valid
);

// Array maximum items
$validator = Validator::validate(
    ['categories' => 'max:5'],
    ['categories' => ['tech', 'news']]  // ✅ Valid (2 items)
);
```

### Data Type Rules

#### Integer Rule
Validates that the value is an integer.

```php
$validator = Validator::validate(
    ['age' => 'integer'],
    ['age' => 25]  // ✅ Valid
);

// Also valid:
// ['age' => '30']              // ✅ String numbers are valid

// Invalid examples:
// ['age' => 25.5]              // ❌ Float value
// ['age' => 'twenty']          // ❌ Text value
```

#### Array Rule
Validates that the value is an array.

```php
$validator = Validator::validate(
    ['tags' => 'array'],
    ['tags' => ['php', 'javascript']]  // ✅ Valid
);

// Invalid examples:
// ['tags' => 'php,javascript']     // ❌ String value
// ['tags' => 123]                  // ❌ Number value
```

### Advanced Rules

#### Same Value (sameValue)
Validates that the field value matches a specific value.

```php
$validator = Validator::validate(
    ['confirmation' => 'sameValue:yes'],
    ['confirmation' => 'yes']  // ✅ Valid
);

// For password confirmation:
$validator = Validator::validate(
    [
        'password' => 'required|min:8',
        'password_confirmation' => 'sameValue:' . $_POST['password']
    ],
    $_POST
);
```

#### Each Rule
Validates each item in an array against specified rules.

```php
// Validate each email in an array
$validator = Validator::validate(
    ['emails' => 'each:email'],
    ['emails' => ['user1@example.com', 'user2@example.com']]  // ✅ Valid
);

// Validate each item with multiple rules (`&` [AND] operator)
$validator = Validator::validate(
    ['usernames' => 'each:required&stringOnly&min:3'],
    ['usernames' => ['john', 'jane', 'mike']]  // ✅ Valid
);

// Validate each item with OR operator
$validator = Validator::validate(
    ['identifiers' => 'each:email,integer'],
    ['identifiers' => ['user@example.com', 12345]]  // ✅ Valid
);
```

### Combining Multiple Rules

You can combine multiple rules using the pipe (`|`) separator:

```php
$validator = Validator::validate(
    [
        'username'	=> 'required|stringOnly|min:3|max:20',
        'email'		=> 'required|email',
        'password'	=> 'required|min:8|mixedCase',
        'age'		=> 'required|integer|min:18|max:100',
        'tags'		=> 'array|min:1|max:10',
        'skills'	=> 'each:stringOnly&min:2'
    ],
    [
        'username'	=> 'johndoe',
        'email'		=> 'john@example.com',
        'password'	=> 'MySecure123',
        'age'		=> 25,
        'tags'		=> ['php', 'javascript'],
        'skills'	=> ['programming', 'design']
    ]
);

$data = $validator->getData();

```

### Error Handling Example

If any data is invalid then `error` method will return error messages array. Otherwise it'll return empty array.

```php
$validator = Validator::validate(
    [
        'username' => 'required|stringOnly|min:3',
        'email' => 'required|email'
    ],
    [
        'username' => 'ab',  // Too short
        'email' => 'invalid-email'  // Invalid format
    ]
);

$errors = $validator->error();
if ($errors) {
    // Handle validation errors
    foreach ($errors as $field => $message) {
        echo "Error in {$field}: {$message[0]}\n";
    }
}

$data = $validator->getData();
```
