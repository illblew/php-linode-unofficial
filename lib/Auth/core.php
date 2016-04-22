<?php

require __DIR__ . '/../Common/Curl.php';

class Auth {

    function GetAuth($endpoint,$clientId,$clientSecret,$code) {
        $curl = new Curl;
        $post = array(
        'client_id' => $clientId,
        'client_secret' => $clientSecret,
        'code' => $code);
        $headers = "Content-type: application/x-www-form-urlencoded";
        $authCurl = $curl->CurlPost($endpoint . "token",$headers,$post);
        return $authCurl;
    }
}

?>
