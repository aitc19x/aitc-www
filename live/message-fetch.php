<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/db.php");

header("Content-Type: application/json; charset=UTF-8");
$last_time = filter_input(INPUT_POST, "lastTime");
$ret = [
    "msg" => get_msg($last_time)
];
echo(json_encode($ret));