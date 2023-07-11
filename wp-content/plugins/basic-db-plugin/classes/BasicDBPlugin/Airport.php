<?php

namespace BasicDBPlugin;

class Airport 
{
    public static function init()
    {
        add_action( 'wp_ajax_airport_action', [__CLASS__, 'airport_action_callback'] );
        add_action( 'wp_ajax_nopriv_airport_action', [__CLASS__, 'airport_action_callback'] );
    }

    public static function plugin_scripts()
    {
        wp_enqueue_script( 'basic_db_plugin_script', BDBP_URL . '/assets/js/script.js' , array(), null );

        wp_localize_script( 'basic_db_plugin_script', 'bdbpData', [
            'ajax_url'      => admin_url( 'admin-ajax.php' ),
            'ajax_nonce'    => wp_create_nonce( 'bdbp_ajax_nonce' ),
        ]);
    }

    public static function airport_action_callback()
    {
        global $wpdb;

        $post = stripslashes_deep( $_POST );

        if ( ! isset( $post['nonce'] ) || ! wp_verify_nonce( $post['nonce'], 'bdbp_ajax_nonce' ) ) {
            wp_send_json_error( 'Invalid or missing nonce' );
        }

        if ( !isset( $post['iata'] ) ) {
            wp_send_json_error( 'Invalid data provided' );
        }

        $iata = sanitize_text_field( $post['iata'] );

        $response = array();

        try {
            $prepared_query = $wpdb->prepare( "SELECT * FROM airports WHERE iata = %s", $iata );
            $results = $wpdb->get_results( $prepared_query );

            if ( !empty( $results ) ) {
                $result = $results[0];
                $response['iata'] = $result->iata;
                $response['airport'] = $result->airport;
            } else {
                wp_send_json_error( 'Airport not found.' );
            }
        } catch ( Exception $e ) {
            wp_send_json_error( 'An error occurred while retrieving airport: ' . $e->getMessage() );
        }

        wp_send_json_success( json_encode($response), true );
    }

    public static function plugin_activation() 
    {
        global $wpdb;

        $sql_file = BDBP_PATH . 'db/airports.sql';

        if ( file_exists( $sql_file ) ) {
            $sql_contents = file_get_contents( $sql_file );

            $table_name = $wpdb->prefix . 'airports';
            $drop_table_sql = "DROP TABLE IF EXISTS $table_name;";
            $wpdb->query( $drop_table_sql );

            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
            dbDelta( $sql_contents );
        }
    }
}
