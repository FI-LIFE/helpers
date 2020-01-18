<?php

namespace Neugen\Helpers;

class Str
{
    /**
     * Determine if a given string starts with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    public static function startsWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if ($needle !== '' && mb_substr($haystack, 0, mb_strlen($needle)) === (string) $needle) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string ends with a given substring.
     *
     * @param  string  $haystack
     * @param  string|array  $needles
     * @return bool
     */
    public static function endsWith($haystack, $needles)
    {
        foreach ((array) $needles as $needle) {
            if (mb_substr($haystack, -mb_strlen($needle)) === (string) $needle) {
                return true;
            }
        }

        return false;
    }

    /**
     * Make a string's first character uppercase
     *
     * @param $string
     * @param string $enc
     * @return string
     */
    public static function ucFirst($string, $enc = 'UTF-8')
    {
        return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc).
            mb_substr($string, 1, mb_strlen($string, $enc), $enc);
    }
}
