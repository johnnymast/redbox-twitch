<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

try {

    $twitch = new Redbox\Twitch\Client();

    if (isset($_SESSION['access_token']) == true) {
        $twitch->setAccessToken($_SESSION['access_token']);
    }
    $root = $twitch->root->get();

    echo '<h1>ROOT</h1>';
    print '<pre>';
    print_r($root);
}  catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
