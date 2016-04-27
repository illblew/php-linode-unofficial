<?php

namespace Linode\Common;

class Curl
{
    public function curlPost($endpoint, $header, $post)
    {
        $ch = curl_init();
        $values = array(
            CURLOPT_URL => $endpoint,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_RETURNTRANSFER => 1,
        );
        curl_setopt_array($ch, ($values));
        $response = json_decode(curl_exec($ch), true);

        return $response;
    }

    public function curlGet($endpoint)
    {
        $ch = curl_init();
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $endpoint,
                CURLOPT_USERAGENT => 'linode-php-unoffical',
            )
        );
        $response = curl_exec($ch);

        return $response;
    }
}
