$(".card").hover(function() {
    $(this).addClass("shadow");
}, function() {
    $(this).removeClass("shadow");
});

$(".card-top").hover(function() {
    $(this).addClass("bg-warning");
    $(this).css("background-color", "orange");
}, function() {
    $(this).css("background-color", "orange");
    $(this).removeClass("bg-warning");
})

$(".glob-top").hover(function() {
    $(this).css("background-color", "#990000")
    $(this).css("color", "#ffffff");
}, function() {
    $(this).css("background-color", "orange")
    $(this).css("color", "#000000");
})

$(".home-block").hover(function() {
    $(this).addClass("shadow-lg");
    $(this).attr("z-index", "2");
    $(this).find("img").animate({
        opacity: 0.7
    }, 250);
}, function() {
    $(this).removeClass("shadow-lg");
    $(this).attr("z-index", "1");
    $(this).find("img").animate({
        opacity: 0.5
    }, 250);
});

$(".navbar-toggler").click(function() {
    $(".post-sep").toggle();
    $(".glob-top-sep").toggle();
});