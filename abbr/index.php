<?php

$url = htmlspecialchars($_SERVER['PATH_INFO']);
$url = substr($url, 1);
$url = explode("/", $url);

$abbr = array(
    "" => "/",
    "qq" => "https://wpa.qq.com/msgrd?v=3&uin=2244517522",
    "2019nyuubugrp" => "https://shang.qq.com/wpa/qunwpa?idkey=ca308d99ff961e32405aee3e4261814eaf1b4c67f9502ff65801ec69808064a1",
    "twitter" => "https://twitter.com/aitc19x"
);

http_response_code(302);
header("Location: " . $abbr[$url[0]]);