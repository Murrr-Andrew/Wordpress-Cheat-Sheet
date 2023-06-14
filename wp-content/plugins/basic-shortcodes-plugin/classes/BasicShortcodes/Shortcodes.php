<?php

namespace BasicShortcodes;

class Shortcodes
{
    public static function init()
    {
        add_shortcode('basic_shortcode', [__CLASS__, 'basicShortcode']);
        add_shortcode('basic_shortcode_with_params', [__CLASS__, 'basicShortcodeWithParams']);
        add_shortcode('basic_shortcode_encapsulated', [__CLASS__, 'basicShortcodeEncapsulated']);
        add_shortcode('basic_shortcode_template', [__CLASS__, 'basicShortcodeTemplate']);
    }

    public static function basicShortcode()
    {
        return 'Hello, Andrew!';
    }

    public static function basicShortcodeWithParams( $atts, $content = null )
    {
        $atts = shortcode_atts(array(
            'greetings' => 'Hello',
            'name' => 'Andrew'
        ), $atts);

        $output = '<div style="color: red;">' . $atts['greetings'] . ", " . $atts['name'] . '!</div>';

        return $output;
    }

    public static function basicShortcodeEncapsulated( $atts, $content = null )
    {
        return '<div style="color: purple;">' . $content . '</div>';
    }

    public static function basicShortcodeTemplate( $atts, $content = null )
    {
        $quote = wp_kses_post( $content );

        ob_start();
        include untrailingslashit( BS_PLUGIN_PATH ) . '/views/quote-template.php';
        return ob_get_clean();
    }
}
