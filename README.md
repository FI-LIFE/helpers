[![Build Status](https://travis-ci.org/FI-LIFE/helpers.svg?branch=master)](https://travis-ci.org/FI-LIFE/helpers)

## Install

```bash
composer require neugen/helpers
```
## Usage
#### Neugen\Helpers\Str 
```php
<?php

require 'vendor/autoload.php';

use Neugen\Helpers;

$string = 'this is test string';

$result = Helpers\Str::startsWith($string, 'this');
var_dump($result); // bool(true)

$result = Helpers\Str::endsWith($string, ['string', 'number']);
var_dump($result); // bool(true)

$result = Helpers\Str::ucFirst($string);
var_dump('This is test string'); // string(19) "This is test string"
```