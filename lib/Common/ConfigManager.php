<?php

namespace Linode\Common;

class ConfigManager
{
    public function loadConfig()
    {
        try {
            $config = parse_ini_file('/path/to/config.ini');
            $clientsecret = $config['clientsecret'];
            $clientid = $config['clientid'];
            $baseoauth = $config['baseoauth'];
            $beachballmode = $config['beachballmode'];
            $token = $config['token'];
            $endpoint = $config['endpoint'];

            $configDetails = array(
                'clientsecret' => $clientsecret,
                'clientid' => $clientid,
                'baseoauth' => $baseoauth,
                'beachballmode' => $beachballmode,
                'token' => $token,
                'endpoint' => $endpoint,
            );

            return $configDetails;
        } catch (Exception $e) {
            return false;
        }
    }
}
