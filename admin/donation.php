<?php
/**
 * Donation link.
 *
 * @package    OverEngineer\Mastodon\LinkVerification
 * @subpackage Admin
 * @since      1.1.1
 *
 * @copyright 2023 Konstantinos Pappas <dev@over-engineer.com>
 */

namespace OverEngineer\Mastodon\LinkVerification\Admin;

use const OverEngineer\Mastodon\LinkVerification\PLUGIN_FILE;
use const OverEngineer\Mastodon\LinkVerification\PLUGIN_URL;
use const OverEngineer\Mastodon\LinkVerification\VERSION;

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Forbidden' );
}

/**
 * Filter the action links displayed for this plugin to add a donation link.
 *
 * @param string[] $actions     An array of plugin action links.
 * @param string   $plugin_file Path to the plugin file relative to the `plugins` directory.
 *
 * @return string[] Plugin action links including the donation link.
 */
function add_donation_link( $actions, $plugin_file ) {
    if ( plugin_basename( PLUGIN_FILE ) !== $plugin_file ) {
        return $actions;
    }

    $actions['donate'] = sprintf(
        '<a href="%1$s" target="_blank" rel="noopener noreferrer" class="overengineer-link-verification-action-link">%2$s<span class="screen-reader-text">%3$s</span><span aria-hidden="true" class="dashicons dashicons-external"></span></a>',
        esc_url( 'https://ko-fi.com/overengineer' ),
        esc_html__( 'Buy me a coffee', 'link-verification-for-mastodon' ),
        /* translators: Accessibility text. */
        esc_html__( '(opens in a new tab)', 'link-verification-for-mastodon' )
    );

    return $actions;
}

/**
 * Enqueue stylesheet on the plugins page.
 *
 * @param string $hook The current admin page.
 *
 * @return void
 */
function enqueue_installed_plugins_style( $hook ) {
    if ( $hook !== 'plugins.php' ) {
        // Not on the plugins page, bail early
        return;
    }

    wp_enqueue_style(
        'overengineer-link-verification-installed-plugins',
        PLUGIN_URL . 'assets/css/admin-styles.css',
        array(), // no dependencies
        VERSION
    );
}

add_filter( 'plugin_action_links', 'OverEngineer\Mastodon\LinkVerification\Admin\add_donation_link', 10, 2 );
add_action( 'admin_enqueue_scripts', 'OverEngineer\Mastodon\LinkVerification\Admin\enqueue_installed_plugins_style' );
