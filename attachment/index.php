<?php

$url = htmlspecialchars($_SERVER['PATH_INFO']);
$url = substr($url, 1);
$url = explode("/", $url);

$file = $_SERVER['DOCUMENT_ROOT'] . "/protected/content/post/" . $url[0] . "/" . $url[1] . "/" . $url[2];

if ($url[2] == "en.md" || $url[2] == "ja.md" || $url[2] == "zh.md" || $url[2] == "data.json" || substr($url[2], -4) == ".png") http_response_code(403);
else {
    if (file_exists($file)) {
        top_back:
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $url[2] . '"');
        header('Content-Length: ' . filesize($file));
        readfile($file);
    } else {
        $file = $_SERVER['DOCUMENT_ROOT'] . "/protected/content/post/" . $url[0] . "/top-" . $url[1] . "/" . $url[2];
        if (file_exists($file)) goto top_back;
        http_response_code(404);
    }
}