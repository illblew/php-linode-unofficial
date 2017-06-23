<?php

require '../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

$configManager = new Linode\Common\ConfigManager();
$config = $configManager->loadConfig(); // Load the config

if (!empty($config['token'])) {
    echo 'Your config and token have been loaded for use. See below for example calls you can make!<BR><BR>'."\n";
    echo '<h3>Get Instances</h3>'."\n";
    echo '<pre>'."\n";
    echo '$Datacenters = new Linode\Common\Datacenters();'."\n";
    echo '$Datacenters->getDatacenters();'."\n";
    $Datacenters = new Linode\Common\Datacenters();
    $dcs = $Datacenters->getDatacenters();
    var_dump($dcs);
    echo '</pre>'."\n";

    echo '<h3>Get Instances</h3>'."\n";
    echo '<pre>'."\n";
    echo '$Instances = new Linode\Instances\Instances();<BR>'."\n";
    echo '$Instances->getLinodes();'."\n";
    $Instances = new Linode\Instances\Instances();
    $linodes = $Instances->getLinodes();
    var_dump($linodes);
    echo '</pre>'."\n";


    echo '<BR><BR><h3>Create a Linode</h3>'."\n";
    echo '<pre>'."\n";
    echo '$create = new Linode\Instances\Instances();<BR>'."\n";
    $cool_password = uniqid();
    echo '$create->createLinode("us-east-1a","g5-nanode-1","coolName","coolGroup",null,"'.$cool_password.'",null,null,null,null,"true");<BR><BR>'."\n";
    $Instances = new Linode\Instances\Instances();
    $linode = $Instances->createLinode("us-east-1a","g5-nanode-1","coolName","coolGroup",null,$cool_password,null,null,null,null,"true");
    var_dump($linode);

    $linode_deleted = $Instances->deleteLinode($linode->id);
    var_dump($linode_deleted);
    echo '</pre>'."\n";

    echo '//todo replace with real docs'."\n";

} else {
    echo "You didn't provide a token in your config! Provide it or pass a code to set one.\n";
}


