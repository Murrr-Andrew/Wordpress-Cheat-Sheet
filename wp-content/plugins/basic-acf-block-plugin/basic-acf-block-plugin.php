<?php
/**
 * Plugin Name: Basic ACF Block Plugin
 * Description: Custom Gutenberg block example using ACF plugin.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( in_array( 'advanced-custom-fields-pro/acf.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || class_exists( 'acf' ) ) {
    function register_acf_blocks() {
        register_block_type( __DIR__ . '/blocks/testimonial' );
    }
    add_action( 'init', 'register_acf_blocks' );
} else {
    function basic_acf_block_deactivate()
    {
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die('The Basic ACF Block plugin has been deactivated because it requires the Advanced Custom Fields (ACF) plugin to be installed and activated.');
    }
    add_action('admin_init', 'basic_acf_block_deactivate');
}
