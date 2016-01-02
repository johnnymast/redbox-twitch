<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

/**
 * Please note: This method requires the user to be authenticated.
 */
try {

    $twitch = new Redbox\Twitch\Client;

    if (isset($_SESSION['access_token']) == true) {
        $twitch->setAccessToken($_SESSION['access_token']);
    }

    $twitch->setClientId($config['twitch_client_id'])
            ->setClientSecret($config['twitch_client_secret'])
            ->setRedirectUri($config['twitch_redirect_uri'])
            ->setForceRelogin($config['twitch_force_login']);

    $videos = $twitch->videos->listVideosFollowed(array(
        'offset' => 10,
        'limit'  => 1,
    ));

    ?>
    <h1>List videos from users i am following</h1>
    <?php
    echo '<ul>';
    foreach ($videos as $video) {
        echo '<li><img src="'.$video->getPreview().'" /> '.$video->getTitle().'</li>';
    }
    echo '</ul>';

} catch (Redbox\Twitch\Exception\AuthorizationRequiredException $e)
{
    print '<pre>';
    print_r($e);
}
catch (Exception $e) {
    print '<pre>';
    print_r($e);
}