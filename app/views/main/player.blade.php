<link rel="stylesheet" href="/js/mediaelement/src/css/mediaelementplayer.css" />
<script type="text/javascript" src="/js/mediaelement/build/mediaelement-and-player.min.js"></script>

<video width="100%" height="100%" id="player2" controls="controls" preload="none">
    <!-- MP4 source must come first for iOS -->
    <source type="video/mp4" src="{{$file}}" />
    <!-- WebM for Firefox 4 and Opera -->
    <source type="video/webm" src="{{$file}}" />
    <!-- OGG for Firefox 3 -->
    <source type="video/ogg" src="{{$file}}" />
    <!-- Fallback flash player for no-HTML5 browsers with JavaScript turned off -->
    <object width="640" height="360" type="application/x-shockwave-flash" data="/js/mediaelement/build/flashmediaelement.swf">
        <param name="movie" value="/js/mediaelement/build/flashmediaelement.swf" />
        <param name="flashvars" value="controls=true&amp;file={{$file}}" />
        <img src="/img/Shield_Green.png" width="640" height="360" alt="Here we are" title="No video playback capabilities" />
    </object>
</video>
<script>
    $('audio,video').mediaelementplayer({
        //success: function(player, node) {
        //$('#' + node.id + '-mode').html('mode: ' + player.pluginType);
        //}
    });
</script>