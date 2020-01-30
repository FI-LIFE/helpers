<?php

namespace Neugen\Helpers;

class Auth
{
    /**
     * Generate random password
     *
     * @param int $length
     * @param int $numbers
     * @param string $special
     * @return string
     */
    static public function randomPassword($length = 16, $numbers = 2, $special = '!@#$%^&*()_+|-=')
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $alphabetNumbers = '0123456789';

        if ($special) {
            $alphabet .= $special;
        }

        $password = [];

        $alphaLength = strlen($alphabet) - 1;
        $alphaNumbersLength = strlen($alphabetNumbers) - 1;

        for ($i = 0; $i < $length - $numbers; $i++) {
            $n = rand(0, $alphaLength);
            $password[] = $alphabet[$n];
        }

        for ($i = 0; $i < $numbers; $i++) {
            $n = rand(0, $alphaNumbersLength);
            $password[] = $alphabetNumbers[$n];
        }

        shuffle($password);

        return implode($password);
    }
}
