<?php

$lang = $_GET["lang"];
$target = $_GET["target"];
switch ($lang){
    case "zh":
      setcookie("lang", "zh");
      break;
    case "ja":
      setcookie("lang", "ja");
      break;
    default:
      setcookie("lang", "en");
      break;
}
header("Location: " . $target);