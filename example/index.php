<?php

require '../vendor/autoload.php';

$configManager = new Linode\Common\ConfigManager();
$config = $configManager->loadConfig(); // Load the config

if (!empty($config['token'])) {
    echo 'Your config and token have been loaded for use. See below for example calls you can make!<BR><BR><h3>Get Instances</h3>';
    echo '$Instances = new Linode\Instances\Instances();<BR>';
    echo '$Instances->getLinodes();';
    echo '<BR><BR><h3>Create a Linode</h3>';
    echo '$create = new Linode\Instances\Instances();<BR>';
    echo '$create->createLinode("newark","standard-1","coolName","coolGroup",null,"CoolPassword!",null,null,null,null,"true");';
} else {
    echo "You didn't provide a token in your config! Provide it or pass a code to set one.";
}
