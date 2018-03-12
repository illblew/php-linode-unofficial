<?php

require '../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

$configManager = new Linode\Common\ConfigManager();
$config = $configManager->loadConfig(); // Load the config

if (!empty($config['token'])) {
    echo 'Your config and token have been loaded for use. See below for example calls you can make!<BR><BR>'."\n";
    echo '<h3>Get Regions</h3>';
    echo '<pre>';
    echo '$Regions = new Linode\Common\Regions();<BR>';
    echo '$Regions->getRegions();<br>';
    $Regions = new Linode\Common\Regions();
    $regions = $Regions->getRegions();
    var_dump($regions);
    echo '</pre>' ;

    echo '<h3>Get Instances</h3>';
    echo '<pre>';
    echo '$Instances = new Linode\Instances\Instances();<BR>';
    echo '$Instances->getLinodes();'.'\n';
    $Instances = new Linode\Instances\Instances();
    $linodes = $Instances->getLinodes();
    var_dump($linodes);
    echo '</pre>';

    echo '<h3>Get Images</h3>';
    echo '<pre>';
    echo '$Images = new Linode\Common\Images();<BR>';
    echo '$Images->getImages();<br>';

    $Images = new Linode\Common\Images();
    var_dump($Images->getImages());

    echo '//todo replace with real docs<BR>';

} else {
    echo 'You need to provide a token in your config! Provide it or pass a code to set one.\n';
}


