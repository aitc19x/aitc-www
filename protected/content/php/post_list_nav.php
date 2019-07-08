<?php

if (!isset($_COOKIE["lang"])) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    switch ($lang) {
        case "zh":
            setcookie("lang", "zh");
            header("Refresh:0");
            break;
        case "ja":
            setcookie("lang", "ja");
            header("Refresh:0");
            break;
        default:
            setcookie("lang", "en");
            header("Refresh:0");
            break;
    }
} else {
    if (isset($_SERVER['PATH_INFO'])) {
        $url = htmlspecialchars($_SERVER['PATH_INFO']);
        $url = substr($url, 1);
        $url = explode("/", $url);
        if ($url == array(null)) include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/content/php/post_list.php");
        else {
            if ($url[0] == "post") {
                $id = $url[1];
                include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/content/php/post_md.php");
            }
            if ($url[0] == "vid") {
                $id = $url[1];
                include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/content/php/post_vid.php");
            }
            if ($url[0] == "page") {
                $page = $url[1];
                include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/content/php/post_list.php");
            }
        }
    } else {
        include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/content/php/post_list.php");
    }
}
