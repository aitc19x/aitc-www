function videoPlay(url) {
    if (flvjs.isSupported()) {
        var videoElement = document.getElementById('videoElement');
        var flvPlayer = flvjs.createPlayer({
            type: 'flv',
            url: url
        });
        flvPlayer._config.referrerPolicy = "no-referrer";
        flvPlayer.attachMediaElement(videoElement);
        flvPlayer.load();
    }
}