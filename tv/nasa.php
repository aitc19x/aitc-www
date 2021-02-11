<?php

include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/translation.php");

if ((strpos($_SERVER["HTTP_REFERER"], "http://localhost") === 0 || strpos($_SERVER["HTTP_REFERER"], "https://aitc.cstu.xyz") === 0) && translation_get("lang_code") == "zh") {
    $url = "https://nasa-i.akamaihd.net/hls/live/253565/NASA-NTV1-Public/" . $_GET["req"];
    $ch = curl_init();
    $headers = array("Referer: https://www.nasa.gov");
    curl_setopt($ch, CURLOPT_URL, $url); 
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data =  curl_exec($ch);
    curl_close($ch);
    $data = str_replace("https://nasa-i.akamaihd.net/hls/live/253565/NASA-NTV1-Public/", "/tv/nasa.php?req=", $data);
    echo($data);
} else {
    header('HTTP/1.0 403 Forbidden');
    http_response_code(403);
}