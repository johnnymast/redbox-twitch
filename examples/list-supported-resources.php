<?php
require '../vendor/autoload.php';
require 'config.php';

use Redbox\Twitch;

$twitch = new Redbox\Twitch\Client();
$resources = $twitch->getSupportedFunctions();
// FIXME broken!
?>

<style type="text/css">
    table th { padding: 6px 13px;  border: 1px solid #ddd; font-weight: bold; }
    table td { padding: 6px 13px;  border: 1px solid #ddd;}
    pre { background-color: rgba(0,0,0,0.04); display: inline-block; padding: 6px 13px; }
</style>
<?php foreach($resources as $resource_name => $resource):?>
    <h1>Resource <?php echo strtoupper($resource_name); ?></h1>
    <?php
    $resource_path = $resource->getResourcePath();
    $resource_name = $resource_name;
    $methods       = $resource->getMethods();

    foreach($methods as $method_name => $method)
    {
        echo '<h2>Method ->'.$method_name.'()</h2>';
        echo '<pre>Requires authorization: '.($method['requiresAuth'] ? 'Yes' : 'No').'</pre>';

        if (count($method['parameters']) > 0) {
            echo '<h3>Parameters</h3>';
            ?>
            <table cellpadding="0" cellspacing="0">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Required?</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($method['parameters'] as  $param_name => $param):?>
                    <tr>
                        <td><?php print $param_name; ?></td>
                        <td>
                            <?php
                            $required = false;
                            $required = isset($param['required']) ? $param['required'] : $required;
                            echo $required ? 'Yes' : 'Optional';
                            ?>
                        </td>
                        <td>
                            <?php $last = count($param)-1; $cnt = 0;?>
                            <?php foreach($param as $key => $val):?>
                                <?php
                                echo '<strong>'.$key.'</strong> : '.$val;
                                echo ($cnt < $last) ? ', ' : ''
                                ;?>
                                <?php $cnt++; ?>
                            <?php endforeach; ?>

                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <?php
        }
    }
    ?>
<?php endforeach; ?>





