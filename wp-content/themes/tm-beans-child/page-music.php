<?php get_header(); ?>

<div class="uk-panel-box scwidgets">
	<script src="https://connect.soundcloud.com/sdk/sdk-3.1.2.js"></script>
	<script>
	SC.initialize({
	  client_id: '7hnrMdoK6AvpcdQOwdAY41BhrnXwjh9K'
	});

	var track_url = 'https://soundcloud.com/hanonyc/sets/hano-at-the-bitter-end-demo';
	SC.oEmbed(track_url, { 
		auto_play: false }).then(function(oEmbed) {
	  // console.log('oEmbed response: ', oEmbed);
	  console.log(oEmbed);
	  jQuery(".scwidgets").append(oEmbed.html);
	});
	</script>
</div>