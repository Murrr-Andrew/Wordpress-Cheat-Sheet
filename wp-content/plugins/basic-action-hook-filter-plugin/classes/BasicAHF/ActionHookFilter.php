<?php

namespace BasicAHF;

class ActionHookFilter 
{
    public static function add_footer_message() 
    {
        echo 'Have a good day!';
    }

    public static function init() 
    {
        add_action( 'wp_footer', [__CLASS__, 'add_footer_message'] );
    }

    public static function plugin_activation() {
        error_log('Basic Action Hook Filter Plugin activated', 0);
    }
}