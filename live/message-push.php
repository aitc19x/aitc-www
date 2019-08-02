<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/db.php");

header("Content-Type: application/json; charset=UTF-8");
$msg = $_SERVER['REMOTE_ADDR'] . ": " . filter_input(INPUT_POST, "msg");
$status = insert_msg($msg);
$ret = [
    "status" => $status
];
echo(json_encode($ret));