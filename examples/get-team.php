<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

try {

    $team = 'eg';
    if (isset($_GET['team']) === true) {
        $team = htmlentities($_GET['team']);
    }

    $teams  = array();
    $twitch = new Redbox\Twitch\Client();
    $teams[] = $twitch->teams->getTeamByName(array('team' => $team));
    ?>
    <style type="text/css">
        table th { padding: 6px 13px;  border: 1px solid #ddd; font-weight: bold; }
        table td { padding: 6px 13px;  border: 1px solid #ddd;}
        pre { background-color: rgba(0,0,0,0.04); display: inline-block; padding: 6px 13px; }
    </style>
    <h1>Team <?php echo $team; ?></h1>
    <pre>Please note: In the info field htmlentities() was used to strip the html the table would be huge if i didnt.</pre>
    <table border="0" cellspacing="0" cellpadding="0">
        <thead>
        <th width="14%">Name</th>
        <th width="14%">Displayname</th>
        <th width="14%">Info</th>
        <th width="14%">Created at</th>
        <th width="14%">Updated at</th>
        <th width="14%">Background</th>
        <th width="14%">Logo</th>
        </thead>
        <tbody>
        <?php foreach($teams as $team): ?>
            <tr>
                <td><?php echo $team->getName(); ?></td>
                <td><?php echo $team->getDisplayName(); ?></td>
                <td><?php echo htmlentities($team->getInfo()); ?></td>
                <td><?php echo $team->getCreatedAt(); ?></td>
                <td><?php echo $team->getUpdatedAt(); ?></td>
                <td><?php echo $team->getBackground(); ?></td>
                <td><?php echo $team->getLogo(); ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php
} catch (Exception $e)
{
    print '<pre>';
    print_r($e);
}
