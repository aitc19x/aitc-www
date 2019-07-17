<?php

if (!isset($_COOKIE["lang"])) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    switch ($lang) {
        case "zh":
            setcookie("lang", "zh", time() + (7 * 24 * 60 * 60), "/");
            header("Refresh:0");
            break;
        case "ja":
            setcookie("lang", "ja", time() + (7 * 24 * 60 * 60), "/");
            header("Refresh:0");
            break;
        default:
            setcookie("lang", "en", time() + (7 * 24 * 60 * 60), "/");
            header("Refresh:0");
            break;
    }
} else {
    include $_SERVER['DOCUMENT_ROOT'] . "/protected/content/php/index.php";
}
