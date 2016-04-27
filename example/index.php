<?php

require '../vendor/autoload.php';

$configManager = new Linode\Common\ConfigManager();
$config = $configManager->loadConfig(); // Load the config

//You need to have your callback provide the code or just use a token as provided in the oAuth page.
if (isset($_GET['code'])) {
    $myAuth = new Linode\Auth\Core();
    $code = $_GET['code']; // Get the code from url, these examples are just for testing.
    $myToken[] = $myAuth->getAuth(
        $config['baseoauth'],
        $config['clientid'],
        $config['clientsecret'],
        $code
    );
    echo json_encode($myToken[0]);
    $tokenSet = $myAuth->setTokenAuth($myToken[0]);
} else {
    if (!empty($config['token'])) {
        $tokenSet = $config['token'];
        $myAuth = new Linode\Auth\Core();
        $myToken = $myAuth->getTokenAuth();
        echo 'Your current token: '.$myToken;
    } else {
        echo $config['token'];
        echo "You didn't provide a token in your config! Provide it or pass a code to set one.";
    }
}
