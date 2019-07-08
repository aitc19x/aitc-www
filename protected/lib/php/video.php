<?php

function bilibili_get(string $aid, string $cid) {
    $headers = array(
        "User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:26.0) Gecko/20100101 Firefox/26.0"
    );
    $url = "https://www.kanbilibili.com/api/video/" . $aid . "/download?cid=" . $cid;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $data = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($data, true);
    return str_replace("http://", "https://", $data["data"]["durl"]["0"]["url"]);
}
