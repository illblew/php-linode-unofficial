<?php

namespace Linode\Common;

class Curl
{
    public function curlPost($endpoint, $headers, $post)
    {
        $ch = curl_init();
        $values = array(
            CURLOPT_URL => $endpoint,
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $post,
            CURLOPT_RETURNTRANSFER => true,
        );
        curl_setopt($ch,CURLOPT_HTTPHEADER, $headers);
        curl_setopt_array($ch, ($values));
        $response = curl_exec($ch);
        return $response;
    }

    public function curlGet($endpoint, $token)
    {
        $ch = curl_init();
        if (!empty($token)) {
            $headers = array('Authorization: token ' . $token);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        curl_setopt($ch, CURLOPT_URL, $endpoint);
        $response = curl_exec($ch);
        return $response;
    }
}
