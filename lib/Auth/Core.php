<?php

namespace Linode\Auth;

use Linode\Common\Curl;
use Linode\Common\ConfigManager;

class Core
{

    public function getAuth($endpoint, $clientId, $clientSecret, $code)
    {
        $curl = new Curl();
        $post = array(
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
            'code' => $code,
        );
        $headers = 'Content-type: application/x-www-form-urlencoded';
        $authCurl = $curl->curlPost($endpoint.'token', $headers, $post);

        return $authCurl;
    }


    public function getHeader($withAuth = null) {
        $header = array('Content-Type = application/json');
        if ($withAuth) {
            $token = $this->getTokenAuth();
            $header[] = 'Authorization: Bearer ' . $token;
        }
        return $header;

    }
    // We also need a token stomp to set in the config for the function above
    public function getTokenAuth()
    {
        $myConfig = new ConfigManager();
        $config = $myConfig->loadConfig();
        $myToken = $config['token'];

        return $myToken;
    }

        public function getApiUrl()
    {
        $myConfig = new ConfigManager();
        $config = $myConfig->loadConfig();
        $apiUrl = $config['endpoint'];

        return $apiUrl;
    }
}
