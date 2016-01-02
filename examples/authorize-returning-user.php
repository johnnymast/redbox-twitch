<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;
error_reporting(E_ALL);
ini_set('display_errors', true);

try {

    echo '<h1>Welcome back</h1>';

    if (isset($_GET['code']) === true and isset($_GET['state']) === true)
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

        if ($response = $twitch->auth->requestAccessToken($code, $state)) {
            $_SESSION['access_token'] = $response->getAccessToken();
            echo 'It looks like it all worked out. <a href="get-root.php">Check how get-root looks like now</a> OR <a href="authorize-user.php">Check if your authenticated in authorize-user.php</a>';
        } else {
            die('Die oops something wend wrong.');
        }

    } else {
        if (isset($_SESSION['access_token']) === true) {
            echo 'It looks like it all worked out. <a href="get-root.php">Check how get-root looks like now</a> OR <a href="authorize-user.php">Check if your authenticated in authorize-user.php</a>';
        } else
        echo '<h1>Oops something went wrong</h1>';
    }

} catch(Exception $e) {
    print '<pre>';
    print_r($e);
}