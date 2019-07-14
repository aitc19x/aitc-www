<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/global.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/translation.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/post.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/video.php");
    header_show(translation_get("ondemand"), "ondemand", array(
        "home" => "/",
        "news" => "/news",
        "technology" => "/technology",
        "ondemand" => "/ondemand",
        "about" => "/about"
    ));
?>

<body>
    <?php
    if (isset($_GET["page"])) $url = "ondemand/page/" . $_GET["page"];
    else $url = "ondemand";
    $meta = post_meta_get("ondemand", $id);
    if ($meta == null) {
        $id = "top-" . $id;
        $meta = post_meta_get("ondemand", $id);
    }
    echo(dynamic_element_handle("post-header", array(
        "mark_start" => (substr($id, 0, 3) != "top" ? "" : "<mark>"),
        "mark_end" => (substr($id, 0, 3) != "top" ? "" : "</mark>"),
        "back" => translation_get("back"),
        "type" => (substr($id, 0, 3) != "top" ? "" : translation_get("top") . " ") . translation_get("ondemand"),
        "title" => $meta["title-" . translation_get("lang_code")],
        "url" => $url
    )));
    ?>
    <div class="col-md-8 mx-auto">
        <?php
            if (isset($meta["note-" . translation_get("lang_code")])) {
                if ($meta["note-" . translation_get("lang_code")] != "") $note_available = true;
                else $note_available = false;
            } else $note_available = true;
            if ((isset($meta["note-en"]) || isset($meta["note-ja"]) || isset($meta["note-zh"])) && $note_available) {
                echo("<div class='alert alert-primary' role='alert'>");
                if (isset($meta["note-" . translation_get("lang_code")])) echo($meta["note-" . translation_get("lang_code")]);
                else {
                    if (isset($meta["note-en"])) echo($meta["note-en"]);
                    else {
                        if (isset($meta["note-ja"])) echo($meta["note-ja"]);
                        else {
                            if (isset($meta["note-zh"])) echo($meta["note-zh"]);
                        }
                    }
                }
                echo("</div>");
            }
            switch (translation_get("lang_code")) {
                case "zh":
                    echo(dynamic_element_handle("vid-zh", array(
                        "vid_url" => bilibili_get($meta["embed-bilibili"]["aid"], $meta["embed-bilibili"]["cid"])
                    )));
                    break;
                default:
                    echo(dynamic_element_handle("vid-glob", array(
                        "vid_url" => $meta["embed-youtube"]
                    )));
                    break;
            }
        ?>
    </div>
</body>

<?php footer_show() ?>