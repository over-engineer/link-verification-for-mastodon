<?php
/**
 * Utilities.
 *
 * @package OverEngineer\Mastodon\LinkVerification
 * @since   1.0.0
 *
 * @copyright 2022 Konstantinos Pappas <dev@over-engineer.com>
 */

namespace OverEngineer\Mastodon\LinkVerification;

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Forbidden' );
}

class Utils {

    /**
     * Check if a string starts with a given substring.
     *
     * Equivalent to `str_starts_with()` in PHP 8.
     *
     * @param string $haystack The string to search in.
     * @param string $needle   The substring to search for in the `haystack`.
     *
     * @return bool `true` if `haystack` begins with `needle`, `false` otherwise.
     */
    public static function starts_with( $haystack, $needle ) {
        if ( empty( $needle ) ) {
            return true;
        }

        return strpos( $haystack, $needle ) === 0;
    }

    /**
     * Return the given string with the given prefix removed.
     *
     * @param string $prefix Prefix to remove from the string.
     * @param string $str    String to remove the prefix from.
     *
     * @return string
     */
    public static function strip_prefix( $prefix, $str ) {
        if ( ! is_string( $prefix ) || ! is_string( $str ) ) {
            return $str;
        }

        if ( self::starts_with( $str, $prefix ) ) {
            return substr( $str, strlen( $prefix ) );
        }

        return $str;
    }

}
