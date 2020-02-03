[![Build Status](https://travis-ci.org/FI-LIFE/helpers.svg?branch=master)](https://travis-ci.org/FI-LIFE/helpers)
![Packagist](https://img.shields.io/packagist/l/neugen/helpers)
![Packagist Version](https://img.shields.io/packagist/v/neugen/helpers)

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

#### Neugen\Helpers\Cli 

```php
<?php

require 'vendor/autoload.php';

use Neugen\Helpers;

if (!Helpers\Cli::confirm('Do you want to continue?'))
    exit;

Helpers\Cli::p('Yellow text on blue background', Helpers\Cli::T_YELLOW, Helpers\Cli::BG_BLUE);

Helpers\Cli::p('Red text on yellow background', Helpers\Cli::T_RED, Helpers\Cli::BG_YELLOW);

$mail = Helpers\Cli::prompt('Enter email', 'example@mail.com');
var_dump($mail); // string(16) "example@mail.com"
```

#### Neugen\Helpers\Auth 

```php
<?php

require 'vendor/autoload.php';

use Neugen\Helpers;

$result = Helpers\Auth::randomPassword();
var_dump($result); // string(16) "...."
```
