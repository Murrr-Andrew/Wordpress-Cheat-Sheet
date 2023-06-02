<?php
/**
 * Plugin Name: Basic CPT Plugin
 * Description: Custom post type example.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function hotels_register_post_type() {
    $labels = array(
        'name'               => 'Hotels',
        'singular_name'      => 'Hotel',
        'menu_name'          => 'Hotels',
        'name_admin_bar'     => 'Hotel',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Hotel',
        'new_item'           => 'New Hotel',
        'edit_item'          => 'Edit Hotel',
        'view_item'          => 'View Hotel',
        'all_items'          => 'All Hotels',
        'search_items'       => 'Search Hotels',
        'parent_item_colon'  => 'Parent Hotels:',
        'not_found'          => 'No hotels found.',
        'not_found_in_trash' => 'No hotels found in Trash.'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'hotels' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'show_in_rest'       => true,
        'menu_icon'          => 'dashicons-building',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' )
    );

    register_post_type( 'hotels', $args );
}
add_action( 'init', 'hotels_register_post_type' );
