<?php
/**
 * Plugin Name: Basic Slider Plugin
 * Description: Custom slider example.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'BSP_URL', plugins_url('', __FILE__) );
define( 'BSP_PATH', plugin_dir_path(__FILE__) );

require_once __DIR__ . '/classes/autoload.php';

add_action( 'plugins_loaded', ['BasicSlider\Settings', 'init'] );
