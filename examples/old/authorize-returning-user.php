<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

echo '<h1>Welcome back</h1>';

if (isset($_GET['code']) == true and isset($_GET['state']) == true)
{
    $code  = htmlentities($_GET['code']);
    $state = htmlentities($_GET['state']);

    if ($state != session_id())
        die('Computer says noooo.');

    $twitch = new Redbox\Twitch\Client();
    $twitch->setClientId($config['twitch_client_id'])
        ->setClientSecret($config['twitch_client_secret'])
        ->setRedirectUri($config['twitch_redirect_uri'])
        ->setForceRelogin($config['twitch_force_login']);

    if ($response = $twitch->requestAccessToken($code, $state)) {
        if ($response instanceof Twitch\AccessToken) {
            $_SESSION['access_token'] = $response->getAccessToken();
            print_r($_SESSION);

            echo 'It looks like it all worked out. <a href="get-root.php">Check how get-root looks like now</a> OR <a href="authorize-user.php">Check if your authenticated in authorize-user.php</a>';
        } else {
            echo 'oops an error has been returned: <b>'.$response->getMessage().'</b>';
        }


    } else {

    }


} else {
    echo '<h1>Oops something went wrong</h1>';
}