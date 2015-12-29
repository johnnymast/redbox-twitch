<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

$twitch = new Redbox\Twitch\Client();
$games = $twitch->getTopGames();

/**
 * Output the changes since index action.
 */
if(php_sapi_name() == "cli") {

    echo "New files\n\n";
    foreach ($report->getNewfiles() as $file) {
        echo $file->getFilename().' '.Redbox\Scan\Filesystem\FileInfo::getFileHash($file->getRealPath())."\n";
    }

    echo "\nModified Files\n\n";
    foreach ($report->getModifiedFiles() as $file) {
        echo $file->getFilename().' '.Redbox\Scan\Filesystem\FileInfo::getFileHash($file->getRealPath())."\n";
    }
    echo "\n";

} else {
    echo '<h1>New files</h1>';
    foreach ($report->getNewfiles() as $file) {
        echo '<li>'.$file->getFilename().' '.Redbox\Scan\Filesystem\FileInfo::getFileHash($file->getRealPath()).'</li>';
    }
    echo '</ul>';

    echo '<h1>Modified Files</h1>';
    foreach ($report->getModifiedFiles() as $file) {
        echo '<li>'.$file->getFilename().' '.Redbox\Scan\Filesystem\FileInfo::getFileHash($file->getRealPath()).'</li>';
    }
    echo '</ul>';
}