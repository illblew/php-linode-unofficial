<?php
namespace Linode\Common;

class ConfigManager {
    public function loadConfig($configFile) {
        try {
            $config = parse_ini_file($configFile);
            $clientsecret = $config['clientsecret'];
            $clientid = $config['clientid'];
            $baseoauth = $config['baseoauth'];
            $beachballmode = $config['beachballmode'];

            $configDetails = array ("clientsecret" => $clientsecret, "clientid" => $clientid, "baseoauth" => $baseoauth, "beachballmode" => $beachballmode);
            return $configDetails;
        } catch (Exception $e) {
            return False;
        }
    }
}
