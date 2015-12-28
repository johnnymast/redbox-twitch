<?php
require 'vendor/autoload.php';
use Redbox\Twitch;

$twitch = new Redbox\Twitch\Client();
$twitch->getTopGames();