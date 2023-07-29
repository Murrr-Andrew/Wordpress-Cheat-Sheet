<?php
/**
 * Plugin Name: Basic Context Plugin
 * Description: Custom context example.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'BCP_URL', plugins_url('', __FILE__) );
define( 'BCP_PATH', plugin_dir_path(__FILE__) );

require_once __DIR__ . '/classes/autoload.php';

add_action( 'init', ['BasicContext\Settings', 'init'] );
