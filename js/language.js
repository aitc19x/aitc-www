switch(Cookies.get("lang")) {
    case "en":
        $(".switch-lang-en").hide();
        break;
    case "ja":
        $(".switch-lang-ja").hide();
        break;
    case "zh":
        $(".switch-lang-zh").hide();
        break;
}

function changeLang_en() {
    location.href = "/changeLang.php?lang=en&target=" + document.URL;
}
function changeLang_zh() {
    location.href = "/changeLang.php?lang=zh&target=" + document.URL;
}
function changeLang_ja() {
    location.href = "/changeLang.php?lang=ja&target=" + document.URL;
}