<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

// Note this function requires the user to be authenticated.

try {

    $user = 'test_user1';
    if (isset($_GET['username']) === true) {
        $user = htmlentities($_GET['username']);
    }

    $twitch = new Redbox\Twitch\Client();
    if (isset($_SESSION['access_token']) === true) {
        $twitch->setAccessToken($_SESSION['access_token']);
    }

    $user = $twitch->users->getUser();

    echo '<pre>';
    print_r($user);

} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}