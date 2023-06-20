<?php
/**
 * Plugin Name: Basic Shortcodes Plugin
 * Description: Custom shortcodes examples.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define('BS_PLUGIN_PATH', plugin_dir_path(__FILE__));

require __DIR__ . '/classes/autoload.php';

function basicShortcodesInit()
{
    BasicShortcodes\Shortcodes::init();
}

add_action( 'plugins_loaded', 'basicShortcodesInit' );
