<?php
/**
 * Plugin Name: Basic CT Plugin
 * Description: Custom taxonomy example.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function create_hotels_category_taxonomy() {
    $labels = array(
        'name'                       => 'Hotels Categories',
        'singular_name'              => 'Hotels Category',
        'search_items'               => 'Search Hotels Categories',
        'popular_items'              => 'Popular Hotels Categories',
        'all_items'                  => 'All Hotels Categories',
        'parent_item'                => 'Parent Hotels Category',
        'parent_item_colon'          => 'Parent Hotels Category:',
        'edit_item'                  => 'Edit Hotels Category',
        'update_item'                => 'Update Hotels Category',
        'add_new_item'               => 'Add New Hotels Category',
        'new_item_name'              => 'New Hotels Category Name',
        'separate_items_with_commas' => 'Separate Hotels Categories with commas',
        'add_or_remove_items'        => 'Add or remove Hotels Categories',
        'choose_from_most_used'      => 'Choose from the most used Hotels Categories',
        'menu_name'                  => 'Hotels Categories',
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true,
        'public'            => true,  // Set to false if you don't want the taxonomy to be publicly queryable
        'show_ui'           => true,  // Set to false if you don't want a UI for managing the taxonomy
        'show_admin_column' => true,  // Set to false if you don't want the taxonomy column in the admin post list
        'query_var'         => true,  // Set to false if you don't want the taxonomy to be queryable
        'rewrite'           => array( 'slug' => 'hotels-category' ),  // Customize the URL slug for your taxonomy
        'show_in_rest'      => true,          // Enable support for Gutenberg
        'rest_base'         => 'hotels-category'
    );

    register_taxonomy( 'hotels_category', array( 'hotels' ), $args );  // Change 'hotels' to your desired post type
}
add_action( 'init', 'create_hotels_category_taxonomy' );
