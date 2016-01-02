<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;
use Redbox\Twitch\Scope;

$twitch = new Redbox\Twitch\Client();
$twitch->setClientId($config['twitch_client_id'])
       ->setClientSecret($config['twitch_client_secret'])
       ->setRedirectUri($config['twitch_redirect_uri'])
       ->setForceRelogin($config['twitch_force_login']);

if (isset($_SESSION['access_token']) == true) {
    $twitch->setAccessToken($_SESSION['access_token']);
}

// TODO change to getRoot()
$token  = $twitch->root->getRoot();

/**
 * State is for defending XSS attacks.
 * It is optional for createAuthUrl() but it is a good practice to use it.
 *
 * Also note that if you use it don't forget to check the value (see authorize-returning-user.php).
 */
$state = session_id();

// TODO check without state if the flow still works ..

$url = $twitch->getAuthModel()->createAuthUrl(Scope::generate(array(Scope::SCOPE_USER_READ)), $state);


if ($token->isValid() == false) {
    echo 'You are not authorized, you should click <a href="'.$url.'">This link</a> to authorize your self. Please note you will not return to this script in fact you will return to '.$config['twitch_redirect_uri'];
} else {
    echo 'You are correctly authorized';
}
