<?php
require 'vendor/autoload.php';

$configFile = 'config.ini'; // Target config to use
$configManager = new Linode\Common\ConfigManager;
$config = $configManager->loadConfig($configFile); // Load the config

//You need to have your callback provide the code or just use a token as provided in the oAuth page.
if($_GET['auth'] == 1 && isset($_GET['code'])) {
                $myAuth = new Linode\Auth\Core;
                $code = $_GET['code']; // Get the code from url, these examples are just for testing.
                $myToken[] = $myAuth->GetAuth($config['baseoauth'],$config['clientid'],$config['clientsecret'],$code);
                echo json_encode($myToken[0]);
        }
        else
        {
                echo "You need to provide a code to get a token!";
        }

