<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

try {

    $user = 'test_user1';
    if (isset($_GET['username']) === true) {
        $user = htmlentities($_GET['username']);
    }

    $twitch = new Redbox\Twitch\Client();

    $user = $twitch->users->getUserByUsername(array(
        'user' => $user
    ));

    echo '<pre>';
    print_r($user);

} catch (Exception $e) {
    print '<pre>';
    print_r($e);
}