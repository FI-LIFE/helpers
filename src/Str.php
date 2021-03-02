<?php

namespace Neugen\Helpers;

class Str
{
    /**
     * Determine if a given string starts with a given substring.
     * c&p from Laravel Helpers
     *
     * @param string $haystack
     * @param string|array $needles
     * @return bool
     */
    public static function startsWith($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if ($needle !== '' && substr($haystack, 0, strlen($needle)) === (string)$needle) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if a given string ends with a given substring.
     * c&p from Laravel Helpers
     *
     * @param string $haystack
     * @param string|array $needles
     * @return bool
     */
    public static function endsWith($haystack, $needles)
    {
        foreach ((array)$needles as $needle) {
            if (substr($haystack, -strlen($needle)) === (string)$needle) {
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
        return mb_strtoupper(mb_substr($string, 0, 1, $enc), $enc) .
            mb_substr($string, 1, mb_strlen($string, $enc), $enc);
    }

    /**
     * Pad the right side of a string with another.
     *
     * @param string $value
     * @param int $length
     * @param string $pad
     * @return string
     */
    public static function padRight(string $value, $length, $pad = ' ')
    {
        return static::str_pad($value, $length, $pad, STR_PAD_RIGHT);
    }

    /**
     * Pad the left side of a string with another.
     *
     * @param string $value
     * @param int $length
     * @param string $pad
     * @return string
     */
    public static function padLeft(string $value, $length, $pad = ' ')
    {
        return static::str_pad($value, $length, $pad, STR_PAD_LEFT);
    }

    private static function str_pad($string, $length, $pad_string = " ", $pad_type = STR_PAD_RIGHT, $encoding = 'UTF-8')
    {
        $result = $string;

        if (($paddingRequired = $length - mb_strlen($string, $encoding)) > 0) {
            switch ($pad_type) {
                case STR_PAD_LEFT:
                    $result =
                        mb_substr(str_repeat($pad_string, $paddingRequired), 0, $paddingRequired, $encoding) .
                        $string;
                    break;
                case STR_PAD_RIGHT:
                    $result =
                        $string .
                        mb_substr(str_repeat($pad_string, $paddingRequired), 0, $paddingRequired, $encoding);
                    break;
                case STR_PAD_BOTH:
                    $leftPaddingLength = floor($paddingRequired / 2);
                    $rightPaddingLength = $paddingRequired - $leftPaddingLength;
                    $result =
                        mb_substr(str_repeat($pad_string, $leftPaddingLength), 0, $leftPaddingLength, $encoding) .
                        $string .
                        mb_substr(str_repeat($pad_string, $rightPaddingLength), 0, $rightPaddingLength, $encoding);
                    break;
            }
        }

        return $result;
    }
}
