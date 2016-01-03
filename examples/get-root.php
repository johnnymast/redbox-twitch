<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;
use Redbox\Twitch\Entity;

try {

    $twitch = new Redbox\Twitch\Client();

    if (isset($_SESSION['access_token']) === true) {
        $twitch->setAccessToken($_SESSION['access_token']);
    }

    $stream = new Entity\Stream;
    $stream->setAbc('def');
    echo 'Good: '.$stream->getAbc();
    exit;
    $root = $twitch->root->getRoot();

    echo '<h1>ROOT</h1>';
    print '<pre>';
    print_r($root);
}  catch (Exception $e) {
    print '<pre>';
    print_r($e);
}
