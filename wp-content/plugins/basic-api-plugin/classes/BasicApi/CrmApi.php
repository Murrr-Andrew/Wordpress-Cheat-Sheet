<?php

namespace BasicApi;

class CrmApi 
{
    public static function init()
    {
        add_action('wp_ajax_basic-api-lead-create', [self::class, 'createLead']);
        add_action('wp_ajax_nopriv_basic-api-lead-create', [self::class, 'createLead']);
    }

    private static function getAuth() {
        $login = get_field('basic_api_login', 'option');
        $password = get_field('basic_api_password', 'option');

        return base64_encode($login . ':' . $password);
    }

    private static function getEndpoint() {
        return get_field('basic_api_endpoint', 'option');
    }

    private static function getIp()
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? '';
        $ip = array_values(array_filter(explode(',', $ip)));
        return array_shift($ip);
    }

    private static function getNames($name) {
        $name = explode(' ', $name);
        $name = array_filter($name);
        $lastname = 1 < count($name) ? array_pop($name) : '';
        $firstname = implode(' ', $name);
        return array($firstname, $lastname);
    }

    private static function getLeadData($data)
    {

    }

    public static function createLead($data)
    {
        $auth = self::getAuth();
        $endpoint = self::getEndpoint();
        list($firstname, $lastname) = self::getNames($data['name']);

        

        return wp_remote_post($endpoint, [
            'headers' => [
                "Authorization" => "Basic $auth",
                "Accept-Encoding"=> "Accept-Encoding: gzip, deflate"
            ],
            'body' => $array,
            'timeout' => 60
        ]);
    }
}


