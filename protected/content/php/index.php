<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/global.php");
    include_once($_SERVER['DOCUMENT_ROOT'] . "/protected/lib/php/translation.php");
    header_show(translation_get("homepage"), "home", array(
        "home" => "/",
        "news" => "/news",
        "technology" => "/technology",
        "ondemand" => "/ondemand",
        "live" => "/live",
        "about" => "/about"
    ));
?>

<body>
    <?php echo(file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/protected/content/html/carousel.html")) ?>
    <br>
    <h2 class="col-md-8 mx-auto text-center"><?php echo(translation_get("explore")) ?></h2>
    <br>
    <div class="col-10 col-md-8 mx-auto row justify-content-around text-center">
        <div class="col-4 col-md-2 home-block">
            <a href="/news">
                <img src="/img/home-news.png">
                <span><?php echo(translation_get("news")) ?></span>
            </a>
        </div>
        <div class="col-4 col-md-2 home-block">
            <a href="/technology">
                <img src="/img/home-technology.png">
                <span><?php echo(translation_get("technology")) ?></span>
            </a>
        </div>
        <div class="col-4 col-md-2 home-block">
            <a href="/ondemand">
                <img src="/img/home-ondemand.png">
                <span><?php echo(translation_get("ondemand")) ?></span>
            </a>
        </div>
        <div class="col-4 col-md-2 home-block">
            <a href="/live">
                <img src="/img/home-live.png">
                <span><?php echo(translation_get("live")) ?></span>
            </a>
        </div>
        <div class="col-4 col-md-2 home-block">
            <a href="/tv">
                <img src="/img/home-tv.png">
                <span><?php echo(translation_get("tv")) ?></span>
            </a>
        </div>
        <div class="col-4 col-md-2 home-block">
            <a href="/about">
                <img src="/img/home-about.png">
                <span><?php echo(translation_get("about")) ?></span>
            </a>
        </div>
    </div>
</body>

<?php footer_show(); ?>