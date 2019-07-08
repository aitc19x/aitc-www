function turnPage(page) {
    var url = $(location).attr('href');
    var pos = url.indexOf("/page/");
    if (pos != -1) url = url.substr(0, pos);
    if (url.charAt(url.length - 1) == '/') window.location = url + "page/" + page;
    else window.location = url + "/page/" + page;
}