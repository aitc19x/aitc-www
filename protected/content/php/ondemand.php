<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/global.php");
    header_show(translation_get("ondemand"), "ondemand", array(
        "home" => "/",
        "news" => "/news",
        "technology" => "/technology",
        "ondemand" => "/ondemand",
        "easyeng" => "/easyeng",
        "about" => "/about"
    ));
?>

<body>
</body>

<?php footer_show(); ?>