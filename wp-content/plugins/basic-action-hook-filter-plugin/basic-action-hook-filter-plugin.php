<?php
/**
 * Plugin Name: Basic Action Hook Filter Plugin
 * Description: Custom action hook filter examples.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/classes/autoload.php';

register_activation_hook( __FILE__, 'BasicAHF\ActionHookFilter::plugin_activation' );

add_action( 'plugins_loaded', 'BasicAHF\ActionHookFilter::init_plugin' );
add_action( 'init', 'BasicAHF\ActionHookFilter::init' );
