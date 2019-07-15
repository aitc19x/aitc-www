<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/translation.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/Parsedown.php");

function markdown_check_content(string $type, string $id, string $lang) {
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . "/protected/content/post/". $type . "/" . $id . "/" . $lang . ".md")) {
        if (file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/protected/content/post/". $type . "/" . $id . "/" . $lang . ".md") == "") return 2;
        else return 1;
    }
    else {
        return 0;
    }
}

function markdown_read(string $type, string $id) {
    $lang = translation_get("lang_code");
    if (markdown_check_content($type, $id, $lang) == 2) return "The post does not exist.";
    if (markdown_check_content($type, $id, $lang) == 0) {
        $lang = "en";
        if (markdown_check_content($type, $id, "en") == 0) {
            $lang = "ja";
            if (markdown_check_content($type, $id, "ja") == 0) {
                $lang = "zh";
                if (markdown_check_content($type, $id, "zh") == 0) {
                    return "The post does not exist.";
                }
            }
        }
    }
    $markdown = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/protected/content/post/". $type . "/" . $id . "/" . $lang . ".md");
    $Parsedown = new Parsedown();
    return $Parsedown->text($markdown);
}

function markdown_list(string $type) {
    $files = scandir($_SERVER['DOCUMENT_ROOT'] . "/protected/content/post/". $type, true);
    array_splice($files, sizeof($files) - 2, sizeof($files));
    return $files;
}

function post_meta_get(string $type, string $id) {
    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . "/protected/content/post/". $type . "/" . $id . "/data.json")) return null;
    return json_decode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/protected/content/post/". $type . "/" . $id . "/data.json"), true);
}