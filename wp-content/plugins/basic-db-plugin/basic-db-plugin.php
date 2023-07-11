<?php
/**
 * Plugin Name: Basic DB Plugin
 * Description: Custom plugin with db examples.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'BDBP_URL', plugins_url('', __FILE__) );
define( 'BDBP_PATH', plugin_dir_path(__FILE__) );

require_once __DIR__ . '/classes/autoload.php';

add_action( 'init', 'BasicDBPlugin\Airport::init' );

add_action( 'wp_enqueue_scripts', 'BasicDBPlugin\Airport::plugin_scripts' );

register_activation_hook( __FILE__, ['BasicDBPlugin\Airport', 'plugin_activation'] );
