<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

$twitch = new Redbox\Twitch\Client();
$games = $twitch->getToken();

print_r($games);

echo 'done';