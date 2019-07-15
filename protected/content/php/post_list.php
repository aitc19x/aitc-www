<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/global.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/post.php");
    header_show(translation_get($type), $type, array(
        "home" => "/",
        "news" => "/news",
        "technology" => "/technology",
        "ondemand" => "/ondemand",
        "easyeng" => "/easyeng",
        "about" => "/about"
    ));
?>

<body>
    <div class="col-md-8 mx-auto">
        <h1><?php echo(translation_get($type)) ?></h1><br>
        <?php
            if (!isset($page)) $page = 1;
            $list = markdown_list($type);
            for ($index = 0; $index < sizeof($list); $index++) {
                if (post_meta_get($type, $list[$index])["title-" . translation_get("lang_code")] == "") {
                    array_splice($list, $index, 1);
                    $index--;
                }
            }
            $size = min(sizeof($list), $page * 20);
            $num_page = (int)(sizeof($list) / 20);
            if (sizeof($list) % 20 != 0 || $num_page == 0) $num_page++;
            for ($index = ($page - 1) * 20; $index < $size; $index++) {
                card_show($type, $list[$index], array(
                    "view" => "/" . $type . (($type == "ondemand" || $type == "easyeng") ? "/vid/" : "/post/") . str_replace("top-", "", $list[$index])
                ));
            }
        ?>
        <div class="btn-group mx-auto d-table page-indicator" role="group">
            <button type="button" class="btn btn-<?php if ($page == 1) echo("secondary"); else echo("light"); ?>" onclick="turnPage(1);"><i class="fas fa-fast-backward"></i></button>
            <button type="button" class="btn btn-<?php if ($page == 1) echo("secondary"); else echo("light"); ?>" onclick="turnPage(<?php if ($page == 1) echo(1); else echo($page - 1); ?>);"><i class="fas fa-chevron-left"></i></button>
            <span class="btn btn-primary"><?php echo($page) ?></span>
            <button type="button" class="btn btn-<?php if ($page == $num_page) echo("secondary"); else echo("light"); ?>" onclick="turnPage(<?php if ($page == $num_page) echo($num_page); else echo($page + 1); ?>)"><i class="fas fa-chevron-right"></i></button>
            <button type="button" class="btn btn-<?php if ($page == $num_page) echo("secondary"); else echo("light"); ?>" onclick="turnPage(<?php echo($num_page) ?>);"><i class="fas fa-fast-forward"></i></button>
        </div>
    </div>
</body>

<?php footer_show() ?>