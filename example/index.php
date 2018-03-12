<?php

require '../vendor/autoload.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

$configManager = new Linode\Common\ConfigManager();
$config = $configManager->loadConfig(); // Load the config

if (!empty($config['token'])) {
    echo 'Your config and token have been loaded for use. See below for example calls you can make!<BR><BR>'."\n";
    echo '<h3>Get Regions</h3>'.'\n';
    echo '<pre>'.'\n';
    echo '$Regions = new Linode\Common\Regions();'.'\n';
    echo '$Regions->getRegions();'.'\n';
    //$Regions = new Linode\Common\Regions();
    //$regions = $Regions->getRegions();
    //var_dump($regions);
    echo '</pre>'.'\n' ;

    echo '<h3>Get Instances</h3>'."\n";
    echo '<pre>'."\n";
    echo '$Instances = new Linode\Instances\Instances();<BR>'."\n";
    echo '$Instances->getLinodes();'.'\n';
    $Instances = new Linode\Instances\Instances();
    $linodes = $Instances->getLinodes();
    var_dump($linodes);
    echo '</pre>'.'\n';

    echo '<h3>Get Images</h3>';
    echo '<pre>'.'\n';
    echo '$Images = new Linode\Common\Images();'.'\n';
    echo '$Images->getImages();'.'\n';

    $Images = new Linode\Common\Images();
    echo $Images->getImages();

    echo '//todo replace with real docs'.'\n';

} else {
    echo 'You need to provide a token in your config! Provide it or pass a code to set one.\n';
}


