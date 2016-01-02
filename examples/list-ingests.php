<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

try {

    $twitch = new Redbox\Twitch\Client();

    if (isset($_SESSION['access_token']) == true) {
        $twitch->setAccessToken($_SESSION['access_token']);
    }
    $ingests = $twitch->ingests->get();
    ?>
    <style type="text/css">
        table th { padding: 6px 13px;  border: 1px solid #ddd; font-weight: bold; }
        table td { padding: 6px 13px;  border: 1px solid #ddd;}
        pre { background-color: rgba(0,0,0,0.04); display: inline-block; padding: 6px 13px; }
    </style>

    <h1>Ingests</h1>
    <table border="0" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th>Name</th>
                <th>Default</th>
                <th>Availability</th>
                <th>url_template</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($ingests as $ingest):?>
            <tr>
                <td><?php echo $ingest->getName(); ?></td>
                <td><?php echo $ingest->isDefault() ? 'Yes' : 'No'; ?></td>
                <td><?php echo $ingest->getAvailability(); ?></td>
                <td><?php echo $ingest->getUrlTemplate(); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
}  catch (Exception $e) {
    print '<pre>';
    print_r($e);
}