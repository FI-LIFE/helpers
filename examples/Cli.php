<?php

require 'vendor/autoload.php';

use Neugen\Helpers;

if (!Helpers\Cli::confirm('Do you want to continue?'))
    exit;

Helpers\Cli::p('Yellow text on blue background', Helpers\Cli::T_YELLOW, Helpers\Cli::BG_BLUE);

Helpers\Cli::p('Red text on yellow background', Helpers\Cli::T_RED, Helpers\Cli::BG_YELLOW);

$mail = Helpers\Cli::get('Enter email', 'example@mail.com');
var_dump($mail); // string(16) "example@mail.com"
