<?php

$lang = $_GET["lang"];
$target = $_GET["target"];
switch ($lang){
    case "zh":
      setcookie("lang", "zh", time() + (7 * 24 * 60 * 60), "/");
      break;
    case "ja":
      setcookie("lang", "ja", time() + (7 * 24 * 60 * 60), "/");
      break;
    default:
      setcookie("lang", "en", time() + (7 * 24 * 60 * 60), "/");
      break;
}
header("Location: " . $target);