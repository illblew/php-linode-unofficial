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
    echo '</pre>' ;

    echo '<h3>Get Instances</h3>';
    echo '<pre>';
    echo '$Instances = new Linode\Instances\Instances();<BR>';
    echo '$Instances->getLinodes();'.'\n';
    echo '</pre>';

    echo '<h3>Get Images</h3>';
    echo '<pre>';
    echo '$Images = new Linode\Common\Images();<BR>';
    echo '$Images->getImages();<BR>';
    echo '</pre>';

    echo '<h3>Get Profile</h3>';
    echo '$Profile = new Linode\Account\Profile();<BR>';
    echo '$Profile->getProfile();';
    echo '</pre>';

    echo '$Domains = new Linode\Domains\Domains();';
    echo '$Domains->getDomains());';
    
    $tags = new Linode\Tags\Tags();
    var_dump($tags->listTags());
} else {
    echo 'You need to provide a token in your config! Provide it or pass a code to set one.\n';
}


