<?php 
$videolink = get_post_meta( get_the_ID(), "qodef_album_video_link_meta", true );
if ($videolink !== ''): ?>
	<h3 class="qodef-latest-video-holder-title"><?php esc_html_e('Latest Video', 'mixtapewp'); ?></h3>
	<div class="qodef-latest-video">
	<?php	
		$embed     = wp_oembed_get( $videolink );
		print $embed;
	?>
	</div>
<?php endif; ?>