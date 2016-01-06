<?php
require '../vendor/autoload.php';
require 'config.php';

unset($_SESSION['access_token']);
unset($_SESSION['scope']);

echo 'Session killed';