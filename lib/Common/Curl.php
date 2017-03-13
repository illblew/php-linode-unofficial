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

    public function curlGet($endpoint, $token)
    {
        $ch = curl_init();
        $headers = array('Authorization: token ' . $token);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        $response = curl_exec($ch);

        return $response;
    }
}
