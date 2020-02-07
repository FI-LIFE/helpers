<?php

namespace Neugen\Helpers;

class Cli
{
    const T_BLACK = '0;33';
    const T_DARK_GRAY = '1;30';
    const T_BLUE = '0;34';
    const T_LIGHT_BLUE = '1;34';
    const T_GREEN = '0;32';
    const T_LIGHT_GREEN = '1;32';
    const T_CYAN = '0;36';
    const T_LIGHT_CYAN = '1;36';
    const T_RED = '0;31';
    const T_LIGHT_RED = '1;31';
    const T_PURPLE = '0;35';
    const T_LIGHT_PURPLE = '1;35';
    const T_BROWN = '0;33';
    const T_YELLOW = '1;33';
    const T_LIGHT_GRAY = '0;37';
    const T_WHITE = '1;37';

    const BG_BLACK = '40';
    const BG_RED = '41';
    const BG_GREEN = '42';
    const BG_YELLOW = '43';
    const BG_BLUE = '44';
    const BG_MAGENTA = '45';
    const BG_CYAN = '46';
    const BG_LIGHT_GRAY = '47';

    /**
     * Return colored string
     *
     * @param string $text String
     * @param null $text_color Text color
     * @param null $background_color Background color
     *
     * @return string
     */
    static public function r(string $text = '', $text_color = null, $background_color = null)
    {
        $string = "";
        $end = '';

        if ($text_color) {
            $string .= "\033[".$text_color."m";
            $end .= "\033[0m";
        }

        if ($background_color) {
            $string .= "\033[".$background_color."m";
            $end .= "\033[0m";
        }

        return $string.$text.$end;
    }

    /**
     * Print colored string
     *
     * @param string $text String
     * @param null $text_color Text color
     * @param null $background_color Background color
     * @param bool $eol Print PHP_EOL
     */
    static public function p(string $text = '', $text_color = null, $background_color = null, $eol = true)
    {
        print self::r($text, $text_color, $background_color);

        if ($eol) {
            print PHP_EOL;
        }
    }

    /**
     * Get confirm from user cli
     *
     * @param $text
     * @param string $confirm_text
     * @return bool
     */
    static public function confirm(string $text, $confirm_text = '[Y/N]')
    {
        self::p($text.' '.$confirm_text.': ', null, null, false);
        $result = trim(readline());

        return $result === 'Y' || $result === 'y';
    }

    /**
     * Prompt value from cli
     *
     * @param $text
     * @param null $default
     * @param string $end_line
     * @return string
     */
    static public function prompt(string $text, $default = null, $end_line = ':')
    {
        $line = $text;

        if ($default !== null) {
            $line .= ' ['.self::r($default, self::T_YELLOW).']';
        }

        self::p($line.$end_line.' ', null, null, false);
        $result = trim(readline());

        return empty($result) ? $default : $result;
    }

    /**
     * @param string $text
     * @param $options
     * @param string $select_text
     * @return mixed|null
     */
    static public function select(string $text, $options, $select_text = 'Select')
    {
        self::p($text, self::T_YELLOW);

        foreach ($options as $key => $option) {
            self::p('['.self::r($key, self::T_YELLOW).'] '.$option['text']);
        }

        $selected = (int)self::prompt($select_text);

        if (isset($options[$selected])) {
            return $options[$selected]['value'];
        }

        return null;
    }
}
