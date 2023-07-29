<?php
/**
 * Plugin Name: Basic CSV Plugin
 * Description: Custom csv creation example.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class BasicCSVPlugin
{
    public function __construct()
    {
        add_action( 'wp_ajax_export_csv', array( $this, 'ajax_export_csv' ) );
        add_action( 'wp_ajax_nopriv_export_csv', array( $this, 'ajax_export_csv' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    }

    public function ajax_export_csv()
    {
        $data_to_export = array(
            array('Column 1', 'Column 2', 'Column 3'),
            array('Value 1', 'Value 2', 'Value 3'),
            array('Value 4', 'Value 5', 'Value 6'),
        );

        $file_name = 'exported_data.csv';
        $file_path = WP_CONTENT_DIR . '/uploads/' . $file_name;

        $file = fopen( $file_path, 'w' );

        foreach ( $data_to_export as $data_row ) {
            fputcsv( $file, $data_row );
        }

        fclose( $file );

        echo json_encode( array( 'file_url' => content_url( 'uploads/' . $file_name ) ) );

        exit;
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script( 'my-csv-export-script', plugin_dir_url( __FILE__ ) . 'js/csv-export.js', array( 'jquery' ), '1.0', true );
        wp_localize_script( 'my-csv-export-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    }
}

new BasicCSVPlugin();
