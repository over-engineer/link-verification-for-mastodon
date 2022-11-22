<?php
/**
 * Plugin Name: Link Verification for Mastodon
 * Plugin URI: https://over-engineer.com/projects/link-verification-for-mastodon
 * Description: A WordPress plugin to quickly verify a link on your Mastodon profile.
 * Version: 1.0.3
 * Author: overengineer
 * Author URI: https://over-engineer.com/
 * Text Domain: link-verification-for-mastodon
 * Domain Path: /languages
 * License: GPLv2
 *
 * Link Verification for Mastodon
 * A WordPress plugin to quickly verify a link on your Mastodon profile.
 * Copyright (c) 2022 over-engineer
 *
 * Link Verification for Mastodon is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Link Verification for Mastodon is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Link Verification for Mastodon. If not, see <http://www.gnu.org/licenses/>.
 *
 * @copyright 2022 Konstantinos Pappas <dev@over-engineer.com>
 */

namespace OverEngineer\Mastodon\LinkVerification;

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Forbidden' );
}

if ( ! class_exists( 'Plugin' ) ) :

    /**
     * Plugin class.
     *
     * @since 1.0.0
     */
    final class Plugin {

        /**
         * @var string Plugin version number.
         */
        private $version = '1.0.3';

        /**
         * @return void
         */
        public function load_textdomain() {
            load_plugin_textdomain(
                'link-verification-for-mastodon',
                false, // this parameter is deprecated
                dirname( plugin_basename( __FILE__ ) ) . '/languages'
            );
        }

        /**
         * Setup plugin constants.
         *
         * @return void
         */
        public function setup_constants() {
            if ( ! defined( 'OverEngineer\Mastodon\LinkVerification\VERSION' ) ) {
                define( 'OverEngineer\Mastodon\LinkVerification\VERSION', $this->version );
            }

            if ( ! defined( 'OverEngineer\Mastodon\LinkVerification\PLUGIN_DIR' ) ) {
                define( 'OverEngineer\Mastodon\LinkVerification\PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
            }

            if ( ! defined( 'OverEngineer\Mastodon\LinkVerification\PLUGIN_URL' ) ) {
                define( 'OverEngineer\Mastodon\LinkVerification\PLUGIN_URL', plugin_dir_url( __FILE__ ) );
            }

            if ( ! defined( 'OverEngineer\Mastodon\LinkVerification\PLUGIN_FILE' ) ) {
                define( 'OverEngineer\Mastodon\LinkVerification\PLUGIN_FILE', __FILE__ );
            }
        }

        /**
         * Require files.
         *
         * @return void
         */
        public function require_files() {
            require_once __DIR__ . '/includes/class-utils.php';

            require_once __DIR__ . '/admin/settings.php';
            require_once __DIR__ . '/includes/verification-tag.php';
        }

        /**
         * Plugin constructor.
         */
        public function __construct() {
            $this->load_textdomain();
            $this->setup_constants();
            $this->require_files();
        }

    }

endif;

/**
 * Load the plugin.
 *
 * @return void
 */
function load_plugin() {
    new Plugin();
}

add_action( 'plugins_loaded', 'OverEngineer\Mastodon\LinkVerification\load_plugin' );
