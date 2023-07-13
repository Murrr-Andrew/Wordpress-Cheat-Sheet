<?php
/**
 * Plugin Name: Basic Rest Api Plugin
 * Description: Custom rest api examples.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class BasicRestApiPlugin
{    
    public function __construct() 
    {
        add_action( 'rest_api_init', array($this, 'register_routes') );
    }

    public function register_routes() 
    {
        register_rest_route('myplugin/v1', '/posts', array(
            array(
                'methods' => 'GET',
                'callback' => array($this, 'get_all_posts'),
            ),
            array(
                'methods' => 'POST',
                'callback' => array($this, 'create_post'),
            ),
        ));

        register_rest_route('myplugin/v1', '/posts/(?P<id>\d+)', array(
            array(
                'methods' => 'GET',
                'callback' => array($this, 'get_post'),
            ),
            array(
                'methods' => 'PUT',
                'callback' => array($this, 'update_post'),
            ),
            array(
                'methods' => 'DELETE',
                'callback' => array($this, 'delete_post'),
            ),
        ));
    }

    public function get_all_posts( $request ) 
    {
        $posts = get_posts(array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'numberposts' => -1,
        ));

        return rest_ensure_response( $posts );
    }

    public function get_post( $request ) 
    {
        $post_id = $request['id'];
        $post = get_post( $post_id );

        if ( empty($post) ) {
            return new WP_Error( 'post_not_found', 'Post not found', array('status' => 404) );
        }

        return rest_ensure_response( $post );
    }

    public function create_post( $request ) 
    {
        $title = sanitize_text_field( $request->get_param('title') );
        $content = sanitize_text_field( $request->get_param('content') );

        $post_id = wp_insert_post(array(
            'post_title' => $title,
            'post_content' => $content,
            'post_status' => 'publish',
            'post_type' => 'post',
        ));

        if ( $post_id === 0 ) {
            return new WP_Error( 'post_creation_failed', 'Post creation failed', array('status' => 500) );
        }

        $post = get_post( $post_id );

        return rest_ensure_response( $post );
    }

    public function update_post( $request ) 
    {
        $post_id = $request['id'];

        $title = sanitize_text_field( $request->get_param('title') );
        $content = sanitize_text_field( $request->get_param('content') );

        $post = array(
            'ID' => $post_id,
            'post_title' => $title,
            'post_content' => $content,
        );

        $updated = wp_update_post( $post );

        if ( $updated === 0 ) {
            return new WP_Error( 'post_update_failed', 'Post update failed', array('status' => 500) );
        }

        $post = get_post( $post_id );

        return rest_ensure_response( $post );
    }

    public function delete_post( $request ) {
        $post_id = $request['id'];

        $deleted = wp_delete_post( $post_id, true );

        if ( $deleted === false ) {
            return new WP_Error( 'post_deletion_failed', 'Post deletion failed', array('status' => 500) );
        }

        return rest_ensure_response( array('message' => 'Post deleted successfully') );
    }
}

$rest_api_crud_plugin = new BasicRestApiPlugin();
