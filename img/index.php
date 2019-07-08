<?php

$url = htmlspecialchars($_SERVER['PATH_INFO']);
$url = substr($url, 1);
$url = explode("/", $url);

$file = $_SERVER['DOCUMENT_ROOT'] . "/protected/content/post/" . $url[0] . "/" . $url[1] . "/" . $url[2] . ".png";

if (file_exists($file)) {
    header('Content-Type: image/png');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
} else {
    echo("File not found.");
}