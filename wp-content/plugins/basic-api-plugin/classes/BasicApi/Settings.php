<?php

namespace BasicApi;

class Settings 
{
    public static function init()
    {
        self::registerOptionsPage();
        self::registerOptionsFileds();
    }

    public static function registerOptionsPage()
    {
        acf_add_options_page(array(
            'page_title' => 'Basic Api',
            'menu_title' => 'Basic Api',
            'menu_slug' => 'basic-api-options',
            'capability' => 'edit_posts',
            'redirect' => false
        ));
    }

    public static function registerOptionsFileds()
    {
        acf_add_local_field_group(array(
            'key' => 'group_648a105d0b4cc',
            'title' => 'Basic Api: Settings',
            'fields' => array(
                array(
                    'key' => 'basic_api_endpoint',
                    'label' => 'Endpoint',
                    'name' => 'endpoint',
                    'aria-label' => '',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'maxlength' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'basic-api-options',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ));
    }
}
