<?php

namespace Linode\Common;

class ConfigManager
{
    public function loadConfig()
    {
	$config_file = getenv('PHP_LINODE_INI')?:__DIR__."/../../config.ini";
        try {
            $config = parse_ini_file($config_file);
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
