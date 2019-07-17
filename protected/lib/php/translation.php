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
    return;
}

$lang = $_COOKIE['lang'];

$translation_japanese = array(
    "lang_code" => "ja",
    "homepage" => "ホームページ",
    "club_name" => "江西師範大学附属中学パソコン部",
    "switch_lang" => "言語選択",
    "follow_us" => "フォローする：",
    "copyright" => "Copyright AMSJXNU IT Club All rights reserved.",
    "home" => "ホーム",
    "news" => "ニュース",
    "technology" => "技術",
    "ondemand" => "オンデマンド",
    "about" => "について",
    "view" => "見る",
    "back" => "戻す",
    "top" => "おすすめ",
    "explore" => "AITCを探索する",
    "meta_description" => "学生オタクを組むパソコン部",
    "easyeng" => "やさしい英語"
);

$translation_chinese = array(
    "lang_code" => "zh",
    "homepage" => "主页",
    "club_name" => "江西师大附中信息技术社",
    "switch_lang" => "语言选择",
    "follow_us" => "关注我们：",
    "copyright" => "版权归江西师大附中信息技术社所有",
    "home" => "主页",
    "news" => "新闻",
    "technology" => "技术",
    "ondemand" => "点播",
    "about" => "关于",
    "view" => "查看",
    "back" => "返回",
    "top" => "置顶",
    "explore" => "深入了解 AITC",
    "meta_description" => "一个由学生极客组成的IT社团",
    "easyeng" => "简明英语"
);

$translation_english = array(
    "lang_code" => "en",
    "homepage" => "Homepage",
    "club_name" => "AMSJXNU IT Club",
    "switch_lang" => "Switch language",
    "follow_us" => "Follow us: ",
    "copyright" => "Copyright AMSJXNU IT Club All rights reserved.",
    "home" => "Home",
    "news" => "News",
    "technology" => "Technology",
    "ondemand" => "On Demand",
    "about" => "About",
    "view" => "View",
    "back" => "Back",
    "top" => "Featured",
    "explore" => "Explore AITC",
    "meta_description" => "An IT club with zealous student geek members",
    "easyeng" => "Easy English"
);

function translation_get(string $id) {
    global $lang, $translation_japanese, $translation_chinese, $translation_english;
    switch ($lang) {
        case "ja":
            return $translation_japanese[$id];
        case "zh":
            return $translation_chinese[$id];
        case "en":
            return $translation_english[$id];
    }
}