<?php

require 'vendor/autoload.php';

use Neugen\Helpers;

$result = Helpers\Auth::randomPassword();
var_dump($result); // string(16) "...."
