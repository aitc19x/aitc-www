<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/global.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/translation.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/post.php");
    header_show(translation_get($type), $type, array(
        "home" => "/",
        "news" => "/news",
        "technology" => "/technology",
        "ondemand" => "/ondemand",
        "about" => "/about"
    ));
?>

<body>
    <?php
    if (isset($_GET["page"])) $url = $type . "/page/" . $_GET["page"];
    else $url = $type;
    if ($type != "about") echo(dynamic_element_handle("post_header", array(
        "mark_start" => ($id > 9 ? "" : "<mark>"),
        "mark_end" => ($id > 9 ? "" : "</mark>"),
        "back" => translation_get("back"),
        "type" => ($id > 9 ? "" : translation_get("top") . " ") . translation_get($type),
        "title" => post_meta_get($type, $id)["title-" . translation_get("lang_code")],
        "url" => $url
    )));
    else {
        if (markdown_read("global", "top") == "The post does not exist.") echo("<div style='padding-top: 75px; display: inline' class='col-12'></div>");
    };
    ?>
    <div class="col-md-8 mx-auto">
        <?php echo(markdown_read($type, $id)) ?>
    </div>
</body>

<?php footer_show() ?>