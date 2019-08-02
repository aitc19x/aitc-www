<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/global.php");
    header_show(translation_get("live"), "live", array(
        "home" => "/",
        "news" => "/news",
        "technology" => "/technology",
        "ondemand" => "/ondemand",
        "live" => "/live",
        "tv" => "/tv",
        "about" => "/about"
    ));
?>

<body>
    <div class="col-md-8 mx-auto">
        <?php
            echo(dynamic_element_handle("live", array(
                "live-title" => translation_get("live"),
                "error-occurred" => translation_get("error_occurred"),
                "live-error-msg" => translation_get("live_error_msg"),
                "message" => translation_get("message"),
                "send" => translation_get("send"),
                "sync" => translation_get("sync")
            )));
        ?>
    </div>
</body>

<?php footer_show(); ?>