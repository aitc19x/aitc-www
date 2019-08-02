var lastTime = 0, msgId = 0, chatStatus = false, timerFetch;

function fetchMessage(thisTime) {
    $.ajax({
        url: "/live/message-fetch.php",
        type: "post",
        data: {
            "lastTime": lastTime
        },
        dataType: "json"
    }).done(function(data) {
        var flag = false;
        $.each(data["msg"], function(key, item) {
            if (item != "" && item != $("#msg-" + (msgId - 1)).text()) {
                $("#messageBox").append("<p id='msg-" + msgId + "'>" + item + "</p>");
                $("#msg-" + (msgId - 20)).remove();
                msgId++;
                flag = true;
            }
        })
        if (flag || lastTime == 0) $("#messageBox").animate({
            scrollTop: $("#messageBox").get(0).scrollHeight
        }, 500);
        lastTime = thisTime;
    })
}

function pushMessage() {
    if (chatStatus == false) return;
    var lastMsg = $("#msg-" + (msgId - 1)).text();
    var compare = lastMsg.substr(lastMsg.indexOf(": ") + 2);
    if (($("#msgInput").val() == "" || $("#msgInput").val() == compare) && $("#msgInput").val() != "1") return;
    $.ajax({
        url: "/live/message-push.php",
        type: "post",
        data: {
            "msg": $("#msgInput").val()
        },
        dataType: "json"
    }).done(function(data) {
        $("#msgInput").val("");
    })
}

function fixSidebar() {
    $("#sidebar").css("max-height", 0);
    $("#sidebar").css("max-height", $("#videoContainer").outerHeight());
}

function startChat() {
    $("#sidebar").css("max-height", $("#videoContainer").outerHeight());
    timerFetch = window.setInterval(function() {
        fetchMessage(parseInt(new Date().getTime() / 1000));
    }, 1000);
    chatStatus = true;
}

function stopChat() {
    clearInterval(timerFetch);
    chatStatus = false;
}

window.onresize = function() {
    fixSidebar();
}