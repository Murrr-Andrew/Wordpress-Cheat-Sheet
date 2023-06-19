<?php

namespace BasicApi;

class ResourceApi
{
    public static function init()
    {
        add_action('wp_ajax_basic-api-create-resource', [self::class, 'createResource']);
        add_action('wp_ajax_nopriv_basic-api-create-resource', [self::class, 'createResource']);
        add_action('wp_enqueue_scripts', [self::class, 'enqueueScripts']);
    }


    public static function enqueueScripts() {
        wp_register_script( 'basic_api_plugin_script', untrailingslashit( BA_PLUGIN_PATH ) . '/assets/js/script.js' , ['jquery'], '1.0', true );
        wp_enqueue_script( 'basic_api_plugin_script' );

        wp_localize_script( 'basic_api_plugin_script', 'bapData', [
            'ajax_url' => admin_url( 'admin-ajax.php' ),
            'ajax_nonce' => wp_create_nonce( 'bap_ajax_nonce' ),
        ]);
    }

    private static function getEndpoint() 
    {
        return get_field('basic_api_endpoint', 'option');
    }

    public static function createResource()
    {

        $post = stripslashes_deep( $_POST );

        if ( ! isset( $post['nonce'] ) || ! wp_verify_nonce( $post['nonce'], 'bap_ajax_nonce' ) ) {
            wp_send_json_error( 'Invalid or missing nonce' );
        }

        if ( !isset( $post['title'], $post['body'], $post['userId'] ) ) {
            wp_send_json_error( 'Invalid data provided' );
        }

        $endpoint   = self::getEndpoint();
        $title      = sanitize_text_field( $post['title'] );
        $body       = sanitize_text_field( $post['body'] );
        $userId     = sanitize_text_field( $post['userId'] );

        $response =  wp_remote_post( $endpoint, [
            'headers'   => ['Content-type' => 'application/json; charset=UTF-8'],
            'body'      => json_encode([
                'title'     => $title,
                'body'      => $body,
                'userId'    => $userId
            ])
        ] );

        if ( is_wp_error( $response ) ) {
            wp_send_json_error( $response->get_error_message() );
        }

        $response_code = wp_remote_retrieve_response_code( $response );

        if ( $response_code != 201 ) {
            wp_send_json_error( 'Unexpected response code received: ' . $response_code );
        }

        $body = wp_remote_retrieve_body( $response );

        if ( empty($body) ) {
            wp_send_json_error( 'Empty response received' );
        }

        wp_send_json_success( json_decode( $body, true ) );
    }
}
