<?php
/**
 * Plugin Name: Custom Elementor FAQ Block
 * Description: A custom Elementor FAQ block.
 * Version: 1.0
 * Author: Your Name
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

add_action('elementor/widgets/widgets_registered', function () {
    require_once(plugin_dir_path(__FILE__) . 'widget-faq.php');
    \Elementor\Plugin::instance()->widgets_manager->register_widget_type(new \Elementor\Custom_Elementor_FAQ_Widget());
});

// Enqueue CSS
function custom_elementor_faq_block_enqueue_styles() {
    wp_enqueue_style('custom-elementor-faq-block', plugins_url('css/style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'custom_elementor_faq_block_enqueue_styles');
