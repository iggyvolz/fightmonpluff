<?php
/**
 * API Eternity Incurakai v1.0.1
 * Copyright 2012 Eternity Incurakai Studios, All Rights Reserved
 * Licensed under the ESCLv1 License
 */

// Work in progress
########## STARTING POINT ##########
$con    = mysqli_connect(db_url, db_uname, db_pwd, db_name);
$result = mysqli_query($con, 'SELECT * FROM `api_yard`');
while ($row = mysqli_fetch_array($result)) {
    if ($row['username'] === $_GET['username']) {
        $yard = unserialize($row['yard']);
    }
}
$result = mysqli_query($con, 'SELECT * FROM `api_stats`');
while ($row = mysqli_fetch_array($result)) {
    $stats = unserialize($row['stats']);
}
$result = mysqli_query($con, 'SELECT * FROM `api_keys`');
while ($row = mysqli_fetch_array($result)) {
    if ($row['username'] === $_GET['username']) {
        if ($row['key'] !== $_GET['key']) {
            echo 'Error - incorrect API key';
        }
    }
}
$tower_type_array = explode('_', $_GET['tower_id']);
$tower_type       = $tower_type_array[0];
if (!in_array($_GET['tower_id'], $yard)) {
    echo 'Error:  Tower does not exist!';
}
if ($yard[$_GET['tower_id']]['upgrading']) {
    echo 'Error:  Tower is already upgrading!';
}
if ($yard[$_GET['tower_id']]['level'] == $stats[$tower_type]['max_levels']) {
    echo 'Error:  Tower is at max level!';
}
$level_to = $yard[$_GET['tower_id']]['level'];
$level_to++;
$yard[$_GET['tower_id']]['level'] = $level_to;
mysqli_query($con, 'UPDATE api_yard SET yard=' . serialize($yard) . ' WHERE username=' . $_GET['username'] . '`');
echo rawurlencode($data);

/* END OF FILE */