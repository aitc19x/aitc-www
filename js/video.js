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

function livePlay(url) {
    if(Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource(url);
        hls.attachMedia(document.getElementById('videoElement'));
        hls.on(Hls.Events.MANIFEST_PARSED,function() {
          video.play();
      });
    }
}