<?php 
	$release_date = get_post_meta(get_the_ID(), 'qodef_album_release_date', true);
	if ($release_date !== '') {
		?>
		<div class="qodef-album-details qodef-album-date">
			<span><?php esc_html_e('Release Date:', 'mixtapewp'); ?></span>
			<span><?php echo esc_attr($release_date); ?></span>
		</div>

		<?php
	}
	    ?>