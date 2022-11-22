<?php
/**
 * Plugin admin settings.
 *
 * @package    OverEngineer\Mastodon\LinkVerification
 * @subpackage Admin
 * @since      1.0.0
 *
 * @copyright  2022 Konstantinos Pappas <dev@over-engineer.com>
 */

namespace OverEngineer\Mastodon\LinkVerification\Admin;

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Forbidden' );
}

function add_admin_menu() {
    if ( ! current_user_can( 'manage_options' ) ) {
        // Current user does not have a role that allows them to access these settings
        return;
    }

    add_options_page(
        __( 'Mastodon Verification', 'link-verification-for-mastodon' ),
        __( 'Mastodon Verification', 'link-verification-for-mastodon' ),
        'manage_options',
        'link-verification-for-mastodon',
        'OverEngineer\Mastodon\LinkVerification\Admin\options_page'
    );
}

function sanitize( $options ) {
    foreach ( $options as $key => $option ) {
        $options[ $key ] = sanitize_text_field( $option );
    }

    return $options;
}

function settings_init() {
    if ( ! current_user_can( 'manage_options' ) ) {
        // Current user does not have a role that allows them to access these settings
        return;
    }

    register_setting(
        'mastodon_link_verification_plugin_page',
        'mastodon_link_verification_settings',
        array(
            'type'              => 'array',
            'sanitize_callback' => 'OverEngineer\Mastodon\LinkVerification\Admin\sanitize',
        )
    );

    add_settings_section(
        'mastodon_link_verification_main_section',
        __( 'Settings', 'link-verification-for-mastodon' ),
        'OverEngineer\Mastodon\LinkVerification\Admin\settings_section_callback',
        'mastodon_link_verification_plugin_page'
    );

    add_settings_field(
        'mastodon_username',
        __( 'Mastodon username', 'link-verification-for-mastodon' ),
        'OverEngineer\Mastodon\LinkVerification\Admin\render_field_mastodon_username',
        'mastodon_link_verification_plugin_page',
        'mastodon_link_verification_main_section'
    );
}

function render_field_mastodon_username() {
    $options = get_option( 'mastodon_link_verification_settings' );
    ?>

    <input type="text"
           name="mastodon_link_verification_settings[mastodon_username]"
           placeholder="@yourusername@your.mastodon.instance"
           value="<?php echo $options['mastodon_username']; ?>" />

    <?php
}

function settings_section_callback() {
    ?>

    <p>

        <?php
        _e(
            'Enter your Mastodon username and click “Save Changes” to verify this website as a link on your profile',
            'link-verification-for-mastodon'
        );
        ?>

    </p>

    <?php
}

function options_page() {
    ?>

    <div class="wrap">
        <form  method="post" action="options.php">
            <h1><?php _e( 'Link Verification for Mastodon', 'link-verification-for-mastodon' ); ?></h1>
            <?php
            settings_fields( 'mastodon_link_verification_plugin_page' );
            do_settings_sections( 'mastodon_link_verification_plugin_page' );
            submit_button();
            ?>
        </form>
    </div>

    <?php
}

add_action( 'admin_menu', 'OverEngineer\Mastodon\LinkVerification\Admin\add_admin_menu' );
add_action( 'admin_init', 'OverEngineer\Mastodon\LinkVerification\Admin\settings_init' );
