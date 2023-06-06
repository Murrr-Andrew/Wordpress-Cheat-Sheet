<?php
/**
 * Plugin Name: Basic Cron Plugin
 * Description: Custom cron job example.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( in_array( 'advanced-custom-fields-pro/acf.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || class_exists( 'acf' ) ) {
    function set_up_acf_settings() 
    {
        acf_add_options_page(array(
            'page_title' => 'Options',
            'menu_title' => 'Options',
            'menu_slug' => 'theme-options',
            'capability' => 'edit_posts',
            'redirect' => false
        ));

        acf_add_local_field_group(array(
            'key' => 'group_options',
            'title' => 'Options',
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'active' => true,
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'theme-options'
                    ),
                ),
            ),
            'fields' => array(
                array(
                    'key' => 'field_custom',
                    'label' => 'Custom Field',
                    'name' => 'custom_field',
                    'type' => 'text',
                    'instructions' => 'Enter your custom field value.',
                ),
            ),
            'hide_on_screen' => array(),
        ));
    }

    function schedule_basic_cron()
    {
        if ( !wp_next_scheduled( 'update_custom_field_cron' ) ) {
            wp_schedule_event( time(), 'hourly', 'update_custom_field_cron' );
        }
        add_action('update_custom_field_cron', 'update_custom_field_value');
    }

    function update_custom_field_value()
    {
        update_field( 'field_custom', time(), 'option' );
    }

    function set_up_plugin_settings()
    {
        if ( function_exists( 'acf_add_options_page' ) ) {
            set_up_acf_settings();
            schedule_basic_cron();
        }
    }
    add_action('plugins_loaded', 'set_up_plugin_settings');
} else {
    function basic_cron_deactivate()
    {
        remove_cron_job();
        deactivate_plugins(plugin_basename(__FILE__));
        wp_die('The Basic Cron plugin has been deactivated because it requires the Advanced Custom Fields (ACF) plugin to be installed and activated.');
    }
    add_action('admin_init', 'basic_cron_deactivate');
}

register_deactivation_hook(__FILE__, 'remove_cron_job');

function remove_cron_job() 
{
    $timestamp = wp_next_scheduled( 'update_custom_field_cron' );

    if ( $timestamp ) {
        wp_unschedule_event( $timestamp, 'update_custom_field_cron' );
    }
}
