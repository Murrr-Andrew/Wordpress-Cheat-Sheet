<?php
/**
 * Plugin Name:       Example Dynamic
 * Description:       Example block scaffolded with Create Block tool.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       example-dynamic
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */

register_block_type( __DIR__ . '/build', array(
	'render_callback' => 'gutenberg_examples_dynamic_render_callback',
));

function gutenberg_examples_dynamic_render_callback( $block_attributes, $content ) 
{
	$numPosts 	= $block_attributes['numPosts'];
	$bgColor 	= $block_attributes['bgColor'];
	$textColor 	= $block_attributes['textColor'];

    $recent_posts = wp_get_recent_posts([
        'numberposts' => $numPosts,
        'post_status' => 'publish',
    ]);

    if (empty($recent_posts)) {
        return 'No posts';
    }

    $output = '';

    foreach ($recent_posts as $post) {
		$output .= sprintf(
			'<div style="background-color: %1$s;"><a href="%2$s" style="color: %3$s;">%4$s</a></div>',
			esc_attr($bgColor),
			esc_url(get_permalink($post['ID'])),
			esc_attr($textColor),
			esc_html(get_the_title($post['ID']))
		);
    }

    return $output;
}
