<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/global.php");
    header_show(translation_get("ondemand"), "ondemand", array(
        "home" => "/",
        "news" => "/news",
        "technology" => "/technology",
        "ondemand" => "/ondemand",
        "tv" => "/tv",
        "about" => "/about"
    ));
?>

<body>
</body>

<?php footer_show(); ?>