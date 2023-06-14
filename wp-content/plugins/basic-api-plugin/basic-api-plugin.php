<?php
/**
 * Plugin Name: Basic Api Plugin
 * Description: Custom api example.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if (in_array('advanced-custom-fields-pro/acf.php', apply_filters('active_plugins', get_option('active_plugins'))) || class_exists('acf')) {
    require_once __DIR__ . '/classes/autoload.php';

    function basic_api_plugin_init()
    {
        BasicApi\Settings::init();
    }

    add_action('plugins_loaded', 'basic_api_plugin_init');
} else {
    add_action('admin_init', 'basic_api_plugin_deactivate');

    function basic_api_plugin_deactivate()
    {
        deactivate_plugins(plugin_basename(__FILE__));
    }
}
