<?php

namespace BasicAHF;

class ActionHookFilter 
{
    public static function init_plugin() 
    {
        add_action( 'wp_footer', [__CLASS__, 'add_footer_message'] );
    }

    public static function init() 
    {
        add_filter( 'the_title', [__CLASS__, 'modify_title'] );
    }

    public static function modify_title($title)
    {
        $modified_title = 'Modified: ' . $title;

        return $modified_title;
    }

    public static function add_footer_message() 
    {
        echo 'Have a good day!';
    }

    public static function plugin_activation() 
    {
        error_log( 'Basic Action Hook Filter Plugin activated', 0 );
    }
}
