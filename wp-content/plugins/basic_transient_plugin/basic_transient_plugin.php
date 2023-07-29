<?php
/**
 * Plugin Name: Basic Transient Plugin
 * Description: Custom transient example.
 * Version: 1.0.0
 * Author: Murrr Andrew
 * License: GNU General Public License v2 or later
 * License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class BasicTransientClass
{
    private $data_transient_key = 'transient_data';
    private $data_expiration = 3600;

    public function __construct()
    {
        add_action( 'init', array( $this, 'init' ) );
    }

    public function init()
    {
        $data = get_transient( $this->data_transient_key );

        if ( false === $data ) {
            $data = $this->generate_data();
            set_transient( $this->data_transient_key, $data, $this->data_expiration );
        }
    }

    private function generate_data()
    {
        $data = array(
            'name' => 'Andrew',
            'surname' => 'Murko'
        );

        return $data;
    }
}

new BasicTransientClass();
