<div class="qodef-audio-playlist-holder">
	<?php
		$embed = wp_oembed_get( $playlist_url );
		print $embed;
	?>
</div>
