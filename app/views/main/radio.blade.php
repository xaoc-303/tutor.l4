<div>
	<div style="float: left;">
		{{ HTML::script('//code.jquery.com/ui/1.10.3/jquery-ui.js') }}
		{{ HTML::style('/js/dynatree/src/skin-vista/ui.dynatree.css') }}
		{{ HTML::script('/js/dynatree/src/jquery.dynatree.js') }}

		<div>Active node: <span id="echoActive">-</span></div>

		<script type="text/javascript">
		$(function(){
			$("#tree").dynatree({
				// In real life we would call a URL on the server like this:
				//          initAjax: {
				//              url: "/getTopLevelNodesAsJson",
				//              data: { mode: "funnyMode" }
				//              },
				// .. but here we use a local file instead:
				initAjax: {
					url: "{{URL::action('RadioController@getRadioList')}}"
				},
				onActivate: function(node) {
					if (!node.data.isFolder) {
						$.get("{{URL::action('RadioController@getPlayerForm')}}/"+node.data.radio_id, function(data) {
							$("#echoActive").html(node.data.title+'<br>'+data);
						});
						//$("#echoActive").text(node.data.url);
					}
				},
				onDeactivate: function(node) {
					//$("#echoActive").text("-");
				}
			});
		});
		</script>
		<div id="tree" style="width:300px;"></div>
	</div>
	<div>
		<embed  type="application/x-shockwave-flash"
			id="flash_app"
			name="flash_app"
			width="619"
			height="552"
			quality="high"
			flashvars=""
			allowfullscreen="true"
			allownetworking="all"
			allowscriptaccess="never"
			allowfullscreeninteractive="true"
			wmode="window"
			src="/src/radio.swf">
	</div>
</div>