<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/translation.php");

function navbar_item_generator(array $links, string $current) {
    $result = "";
    foreach ($links as $key => $value) {
        if ($key != $current)
            $result .= "<li class='nav-item'><a class='nav-link' href='" . $value . "'>" . translation_get($key) . "</a></li> ";
        else
            $result .= "<li class='nav-item active'><a class='nav-link' href='#'>" . translation_get($key) . " <span class='sr-only'>(current)</span></a></li> ";
    }
    return $result;
}