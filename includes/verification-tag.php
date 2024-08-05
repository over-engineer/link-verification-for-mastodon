<?php
/**
 * Verification tag.
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

/**
 * Return a link for the Mastodon profile of the given username and instance.
 *
 * @param string $username Mastodon username.
 * @param string $instance Mastodon instance.
 *
 * @return string
 */
function format_mastodon_url( $username, $instance ) {
    return sprintf( 'https://%1$s/@%2$s', $instance, $username );
}

/**
 * Add the verification `<link>` tag in `<head>`.
 *
 * @param string $mastodon_username Mastodon username.
 *
 * @return void
 */
function add_verification_tag( $mastodon_username ) {
    if ( empty( $mastodon_username ) ) {
        // Mastodon username is not set, bail early
        return;
    }

    // Allow usernames formatted as either `@username@instance` or `username@instance`
    $mastodon_username = Utils::strip_prefix( '@', trim( $mastodon_username ) );

    $username_parts = explode( '@', $mastodon_username );

    if ( count( $username_parts ) !== 2 ) {
        // Malformed username, bail early
        return;
    }

    $username = $username_parts[0];
    $instance = $username_parts[1];

    $url = format_mastodon_url( $username, $instance );

    printf( '<link rel="me" href="%s" />' . PHP_EOL, esc_attr( $url ) );
}

/**
 * Add the verification `<link>` tag in `<head>`.
 *
 * @return void
 */
function add_verification_tags() {
    $options           = get_option( 'mastodon_link_verification_settings' );
    $mastodon_username = $options['mastodon_username'] ?? '';
    $mastodon_username = apply_filters( 'mastodon_link_verification_username', $mastodon_username );

    if ( empty( $mastodon_username ) ) {
        // Mastodon username is not set, bail early
        return;
    }

    // Support for comma-separated usernames
    $mastodon_usernames = explode( ',', $mastodon_username );

    foreach ( $mastodon_usernames as $username ) {
        add_verification_tag( $username );
    }
}

add_action( 'wp_head', 'OverEngineer\Mastodon\LinkVerification\add_verification_tags' );
