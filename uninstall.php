<?php
/**
 * Uninstall.
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
 * Clean up when the plugin gets uninstalled.
 *
 * @return void
 */
function clean_up() {
    unregister_setting( 'mastodon_link_verification_plugin_page', 'mastodon_link_verification_settings' );
    delete_option( 'mastodon_link_verification_settings' );
}

clean_up();
