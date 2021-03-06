<?php

require 'vendor/autoload.php';

use Neugen\Helpers;

$string = 'Это тестовая строка';

$result = Helpers\Str::startsWith($string, 'Это');
var_dump($result); // bool(true)

$result = Helpers\Str::endsWith($string, ['string', 'number']);
var_dump($result); // bool(true)

$result = Helpers\Str::ucFirst($string);
var_dump('This is test string'); // string(19) "This is test string"
