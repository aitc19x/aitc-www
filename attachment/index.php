<?php

$url = htmlspecialchars($_SERVER['PATH_INFO']);
$url = substr($url, 1);
$url = explode("/", $url);

$file = $_SERVER['DOCUMENT_ROOT'] . "/protected/content/post/" . $url[0] . "/" . $url[1] . "/" . $url[2];

if (file_exists($file)) {
    top_back:
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . $url[2] . '"');
    header('Content-Length: ' . filesize($file));
    readfile($file);
    exit;
} else {
    $file = $_SERVER['DOCUMENT_ROOT'] . "/protected/content/post/" . $url[0] . "/top-" . $url[1] . "/" . $url[2];
    if (file_exists($file)) goto top_back;
    echo("File not found.");
}

echo($file);
exit();