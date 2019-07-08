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
    include $_SERVER['DOCUMENT_ROOT'] . "/protected/content/php/index.php";
}
