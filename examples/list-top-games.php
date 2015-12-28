<?php
require '../vendor/autoload.php';
use Redbox\Twitch;

$twitch = new Redbox\Twitch\Client();
$games = $twitch->getTopGames();

print_r($games);

echo 'done';