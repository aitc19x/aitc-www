<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/translation.php");

function date_actual_month_day_get($str) {
    if (substr($str, 0, 1) == "0") return substr($str, 1, 1);
    return $str;
}

function date_english_month_get($mon) {
    switch($mon) {
        case 1:
            return "January";
        case 2:
            return "February";
        case 3:
            return "March";
        case 4:
            return "April";
        case 5:
            return "May";
        case 6:
            return "June";
        case 7:
            return "July";
        case 8:
            return "August";
        case 9:
            return "September";
        case 10:
            return "October";
        case 11:
            return "November";
        case 12:
            return "December";
    }
}

function date_get(string $date) {
    $lang = translation_get("lang_code");
    switch($lang) {
        case "en":
            return date_english_month_get(substr($date, 4, 2)) . " " . date_actual_month_day_get(substr($date, 6, 2)) . ", " . substr($date, 0, 4);
        case "ja":
            return substr($date, 0, 4) . "年" . date_actual_month_day_get(substr($date, 4, 2)) . "月" . date_actual_month_day_get(substr($date, 6, 2)) . "日";
        case "zh":
            return substr($date, 0, 4) . "年" . date_actual_month_day_get(substr($date, 4, 2)) . "月" . date_actual_month_day_get(substr($date, 6, 2)) . "日";
    }
}