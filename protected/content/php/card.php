<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/translation.php");

function card_links_generator(array $links) {
    $result = "";
    foreach ($links as $key => $value) {
        $result .= "<a href='" . $value . "' class='card-link'>" . translation_get($key) . "</a> ";
    }
    return $result;
}