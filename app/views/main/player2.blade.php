<div id=wmp>Загрузка плеера ...<br><a href="http://www.macromedia.com/go/getflashplayer">Скачать</a></div>
<script src="/js/swfobject.js"></script>
<script type="text/javascript">
	var s1 = new SWFObject("/src/player4.swf","single","300","20","7");
	s1.addVariable("type", "mp3");
	s1.addVariable("file","{{$file}}");
	s1.addVariable("autostart","true");
	s1.write("wmp");
</script>