<?php
session_start();

/*
|--------------------------------------------------------------------------
| Twitch configuration
|--------------------------------------------------------------------------
|
| Before you configuration make sure you register your application at
| http://www.twitch.tv/kraken/oauth2/clients/new.
|
| It wil provide you with the information that you will need in this file.
*/
$config['twitch_client_id']     = '';
$config['twitch_client_secret'] = '';
$config['twitch_redirect_uri']  = 'http://localhost/examples/authorize-returning-user.php';
$config['twitch_force_login']   = true;